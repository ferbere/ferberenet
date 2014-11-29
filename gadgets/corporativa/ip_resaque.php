<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
if(isset($_POST['nombre'])){
$nombre=$_POST['nombre'];
}
if(isset($_POST['contenido'])){
$contenido=$_POST['contenido'];
}
if(isset($_POST['vincula'])){
$vincula=$_POST['vincula'];
}
$mysql=mysql_query("INSERT INTO corporativa_resaque (nombre, contenido, vincula) VALUES ('{$nombre}', '{$contenido}', {$vincula}) ",$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="../../corporativa.php?ruta=if_resaque.php&capturado=1";</script>';
echo $vincula."\n".$rubro;
}
?>