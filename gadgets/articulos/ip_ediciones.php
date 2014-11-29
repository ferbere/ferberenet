<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
$nombre=$_POST['nombre'];
$imagen=$_POST['imagen'];
$ruta=$_POST['ruta'];
$liberada=$_POST['liberada'];
$mysql=mysql_query("INSERT INTO articulos_ediciones (nombre,imagen,ruta,liberada) values ('{$nombre}','{$imagen}','{$ruta}','{$liberada}')",$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../articulos.php?ruta=if_ediciones.php&capturado=1";</script>';
}
?>