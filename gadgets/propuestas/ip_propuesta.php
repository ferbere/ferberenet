<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
$nombre=$_POST['nombre'];
$texto=$_POST['texto'];
$categoria=$_POST['categoria'];
$visible=$_POST['visible'];

$mysql=mysql_query("INSERT INTO propuesta_index (nombre,texto,categoria,visible) VALUES ('{$nombre}','{$texto}','{$categoria}','{$visible}')",$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="../../propuestas.php?ruta=if_propuesta.php&capturado=1";</script>';
}
?>