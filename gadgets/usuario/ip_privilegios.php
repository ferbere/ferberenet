<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
$nombre=$_POST['nombre'];

$mysql=mysql_query("INSERT INTO usuario_privilegios (nombre) values ('{$nombre}')",$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../usuario.php?ruta=if_privilegios.php&capturado=1";</script>';
}
?>