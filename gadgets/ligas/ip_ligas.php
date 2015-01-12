<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
$nombre=$_POST["nombre"];
$ruta=$_POST["ruta"];
$imagen=$_POST["imagen"];
$contenido=$_POST["contenido"];
$visible=$_POST["visible"];
$que=mysql_query("INSERT into ligas_index (nombre,ruta,imagen,visible,contenido) values ('{$nombre}','{$ruta}','{$imagen}','{$visible}','{$contenido}') ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../ligas.php?ruta=if_ligas.php&capturado=1";</script>';
}
?>