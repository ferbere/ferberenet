<?php
session_start();
include_once("../../classes/phpqrcode/qrlib.php");
include_once('../../../classes/conex.php');
$link=Conectarse();
if(isset($_POST["rubro"])){
	$rubro=$_POST["rubro"];
}
if(isset($_POST["qr"])){
	$qr=$_POST["qr"];
}
if(isset($_POST["url"])){
	$url=$_POST["url"];
}
if(isset($_POST["descripcion"])){
	$descripcion=$_POST["descripcion"];
}
//if($qr!=''){
	QRcode::png($url,'../../../images/fotos/'.$qr.'.png');
//}
$que=mysql_query("UPDATE qr_index SET qr='$qr', url = '$url',descripcion = '$descripcion' WHERE id = '$rubro'",$link);
if(!$que){die ("Pos no se capturó el descripcion, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../qr.php?ruta=if_qr_a.php&capturado=1";</script>';
}
?>