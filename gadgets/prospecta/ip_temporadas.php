<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
$nombre=$_POST["nombre"];
$fecha=$_POST["fecha"];
$visible=$_POST["visible"];
$que=mysql_query("INSERT INTO prospecta_temporadas (nombre,fecha,visible) VALUES ('{$nombre}','{$fecha}','{$visible}')");
if(!$que){
	die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../prospecta.php?ruta=if_temporadas.php&capturado=1";</script>';
}
?>