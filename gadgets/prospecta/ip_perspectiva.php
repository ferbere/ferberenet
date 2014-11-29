<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
$nombre=$_POST["nombre"];
$visible=$_POST["visible"];
$que=mysql_query("INSERT INTO prospecta_espacio (nombre,visible) VALUES ('{$nombre}','{$visible}') ",$link);
if(!$que){
	die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../prospecta.php?ruta=if_espacio.php&capturado=1";</script>';
}
?>