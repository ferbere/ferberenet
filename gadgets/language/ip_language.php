<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
$nombre=$_POST['nombre'];
$imagen=$_POST['imagen'];
$mysql=mysql_query("INSERT into language_index (nombre,imagen) values ('{$nombre}','{$imagen}')",$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../language.php?ruta=if_language.php&capturado=1";</script>';
}
?>