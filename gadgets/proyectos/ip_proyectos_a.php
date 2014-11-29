<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
if(isset($_POST["rubro"])){
	$rubro=$_POST["rubro"];
}
if(isset($_POST["titulo"])){
	$titulo=$_POST["titulo"];
}
if(isset($_POST["cliente"])){
	$cliente=$_POST["cliente"];
}
if(isset($_POST["fecha"])){
	$fecha=$_POST["fecha"];
}
if(isset($_POST["contenido"])){
	$contenido=$_POST["contenido"];
}
if(isset($_POST["publicado"])){
	$publicado=$_POST["publicado"];
}
if(isset($_POST["proyecto"])){
	$proyecto=$_POST["proyecto"];
}
$que=mysql_query("UPDATE proyectos_index SET titulo = '$titulo', cliente = '$cliente', fecha = '$fecha', contenido = '$contenido', publicado = '$publicado', proyecto = '$proyecto'  WHERE id = '$rubro'",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../proyectos.php?ruta=if_proyectos_a.php&capturado=1";</script>';
}
?>