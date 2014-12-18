<?php
session_start();
include_once('classes/conex.php');
$link=Conectarse();
$nombre=$_POST["nombre"];
$descripcion=$_POST["descripcion"];
$imagen=$_POST["imagen"];
$distrito=$_POST["distrito"];
$categoria=$_POST["categoria"];
$visible=$_POST["visible"];

$ext=$_POST["ext"];
$email=$_POST["email"];
$sala=$_POST["sala"];
$telefonos=$_POST["telefonos"];
$enlace=$_POST["$enlace"];


$que=mysql_query("INSERT INTO perfil_index (nombre,descripcion,imagen,distrito,categoria,visible,ext,email,sala,telefonos,enlace) VALUES ('{$nombre}','{$descripcion}','{$imagen}','{$distrito}','{$categoria}','{$visible}','{$ext}','{$email}','{$sala}','{$telefonos}','{$enlace}') ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="../../perfil.php?ruta=if_perfil.php&capturado=1";</script>';
}
?>