<?php
session_start();
include_once("../../classes/phpqrcode/qrlib.php");
include_once('../../classes/conex.php');
$link=Conectarse();

$qr=$_POST["qr"];
$url=$_POST["url"];
$descripcion=$_POST["descripcion"];

QRcode::png($url,'../../../images/fotos/'.$qr.'.png');


$que=mysql_query("INSERT INTO qr_index (qr,url,descripcion) values ('{$qr}','{$url}','{$descripcion}') ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../qr.php?ruta=if_qr.php&capturado=1";</script>';
	}
?>