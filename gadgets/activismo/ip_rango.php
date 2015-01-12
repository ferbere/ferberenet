<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_POST['nombre'])){
	$nombre=($_POST['nombre']);
}
if(isset($_POST['imagen'])){
	$imagen=($_POST['imagen']);
}
$mysql=mysql_query("INSERT INTO activismo_rango (nombre,imagen) values ('{$nombre}','{$imagen}')",$link);
if(!$mysql){
	die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../activismo.php?ruta=if_rango.php&capturado=1";</script>';
}
?>