<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
$nombre=$_POST["nombre"];
$medidas=$_POST["medidas"];
$precio=$_POST["precio"];
$visible=$_POST["visible"];
$que=mysql_query("INSERT INTO prospecta_anuncio (nombre,medidas,precio,visible) VALUES ('{$nombre}','{$medidas}','{$precio}','{$visible}')");
if(!$que){
	die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../prospecta.php?ruta=if_anuncio.php&capturado=1";</script>';
}
?>