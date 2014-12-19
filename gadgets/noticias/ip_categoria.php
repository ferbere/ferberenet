<?php
include_once('../../classes/conex.php');
$link=Conectarse();
$nombre=$_POST['nombre'];
$imagen=$_POST['imagen'];

$mysql=mysql_query("INSERT into noticias_categoria (nombre,imagen) values ('{$nombre}','{$imagen}')",$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../noticias.php?ruta=if_categoria.php&capturado=1";</script>';
}
?>