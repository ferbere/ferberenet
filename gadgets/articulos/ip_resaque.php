<?php
session_start();
include("style/header_admin.html");
require_once("conex.php");
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
$mysql=mysql_query("INSERT INTO articulos_resaque (nombre, contenido, vincula) VALUES ('{$nombre}', '{$contenido}', {$vincula}) ",$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="'.$_SERVER['HTTP_REFERER'].'?capturado=1";</script>';
echo $vincula."\n".$rubro;
}
include("style/footer_admin.html");
?>