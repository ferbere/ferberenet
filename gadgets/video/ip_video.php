<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
$nombre=$_POST['nombre'];
$fecha=$_POST['fecha'];
$liga=$_POST['liga'];
$descripcion=$_POST['descripcion'];
$visible=$_POST['visible'];
$mysql=mysql_query("INSERT into video_index (nombre,fecha,liga,descripcion,visible) values ('{$nombre}','{$fecha}', '{$liga}','{$descripcion}','{$visible}')",$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../video.php?ruta=if_video.php&capturado=1";</script>';
}
include("style/footer_admin.html");
?>