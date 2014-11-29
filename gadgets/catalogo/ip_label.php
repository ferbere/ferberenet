<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
$nombre=$_POST['nombre'];
$imagen=$_POST['imagen'];
$mysql=mysql_query("INSERT INTO catalogo_label (nombre,imagen) values ('{$nombre}','{$imagen}')",$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="../../catalogo.php?ruta=if_label.php&capturado=1";</script>';
}
?>