<?php
session_start();
include_once("../../classes/phpqrcode/qrlib.php");
include_once('../../classes/conex.php');
$link=Conectarse();

$qr=$_POST["qr"];
$url=$_POST["url"];
$descripcion=$_POST["descripcion"];

$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
		$row_u=mysql_fetch_array($sql_u);
		if(empty($row_u[1])){
			$url_c='../../../';
		}else{
			$url_c='http://'.$row_u[1].'/';
		}
		$path=$url_c.$_SESSION['admin'].'/images/fotos/';

QRcode::png($url,$path.$qr.'.png');


$que=mysql_query("INSERT INTO qr_index (qr,url,descripcion) values ('{$qr}','{$url}','{$descripcion}') ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../qr.php?ruta=if_qr.php&capturado=1";</script>';
}
?>