<?php
session_start();
include_once("../../classes/phpqrcode/qrlib.php");
include_once('../../classes/conex.php');
$link=Conectarse();

$qr=$_POST["qr"];
$urls=$_POST["urls"];
$descripcion=$_POST["descripcion"];

$sql=mysql_query("SELECT url,pagina FROM template_general",$link);
$url=mysql_fetch_array($sql);
if($url[1]==''){
	$path=$url[0].'/'.$_SESSION['admin'].'/images/fotos/';
}else{
	$path=$url[0].'/'.$url[1].'/'.$_SESSION['admin'].'/images/fotos/';
}
QRcode::png($urls,$path.$qr.'.png');


$que=mysql_query("INSERT INTO qr_index (qr,urls,descripcion) values ('{$qr}','{$urls}','{$descripcion}') ",$link);
if(!$que){
	die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../qr.php?ruta=if_qr.php&capturado=1";</script>';
}
?>