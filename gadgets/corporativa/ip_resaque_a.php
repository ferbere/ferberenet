<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
if(isset($_POST['rubro'])){
	$rubro=$_POST['rubro'];
}
if(isset($_POST['nombre'])){
	$nombre=$_POST['nombre'];
}
if(isset($_POST['contenido'])){
	$contenido=$_POST['contenido'];
}
if(isset($_POST['vincula'])){
	$vincula=$_POST['vincula'];
}
$mysql=mysql_query("UPDATE corporativa_resaque SET nombre='$nombre',contenido='$contenido', vincula='$vincula' WHERE id = '$rubro' ",$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="../../corporativa.php?ruta=if_resaque_a.php&capturado=1";</script>';
}
?>