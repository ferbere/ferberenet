<?php
session_start();
include_once("../../classes/conex.php");
$link=Conectarse();

$nombre=$_POST['nombre'];
$mysql=mysql_query("INSERT INTO menus_submenu (nombre) values ('{$nombre}')",$link);
if(!$mysql){
	die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../menus.php?ruta=if_submenu.php&capturado=1";</script>';
}
?>