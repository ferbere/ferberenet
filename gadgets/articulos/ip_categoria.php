<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
$nombre=$_POST['nombre'];
$imagen=$_POST['imagen'];
$belong=$_POST['belong'];
$mysql=mysql_query("INSERT into articulos_categoria (nombre,imagen,belong) values ('{$nombre}','{$imagen}','{$belong}')",$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../articulos.php?ruta=if_categoria.php&capturado=1";</script>';
}
?>