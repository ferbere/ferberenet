<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
if(isset($_POST["nombre"])){
	$nombre=$_POST["nombre"];
}

$que=mysql_query("INSERT INTO congreso_dia (nombre) VALUES ('{$nombre}')",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../congreso.php?ruta=if_dia.php&capturado=1";</script>';
}
?>