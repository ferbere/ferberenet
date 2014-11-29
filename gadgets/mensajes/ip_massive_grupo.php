<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
$nombre=$_POST['nombre'];
$imagen=$_POST['imagen'];
$descripcion=$_POST['descripcion'];
$mysql=mysql_query("INSERT INTO mails_massive_grupo (nombre,imagen,descripcion) values ('{$nombre}','{$imagen}','{$descripcion}')",$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../mensajes.php?ruta=if_massive_grupo.php&capturado=1";</script>';
}
?>