<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_POST["rubro"])){
	$rubro=$_POST["rubro"];
}
if(isset($_POST["nombre"])){
	$nombre=$_POST["nombre"];
}
if(isset($_POST["medidas"])){
	$medidas=$_POST["medidas"];
}
if(isset($_POST["precio"])){
	$precio=$_POST["precio"];
}
if(isset($_POST["visible"])){
	$visible=$_POST["visible"];
}

$que=mysql_query("UPDATE prospecta_anuncio SET nombre = '$nombre', medidas = '$medidas', precio='$precio',visible = '$visible'  WHERE id = '$rubro'",$link);
if(!$que){
	die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../prospecta.php?ruta=if_anuncio_a.php&capturado=1";</script>';
}
?>