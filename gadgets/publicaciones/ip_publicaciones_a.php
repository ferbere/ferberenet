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
if(isset($_POST["genero"])){
	$genero=$_POST["genero"];
}
if(isset($_POST["editor"])){
	$editor=$_POST["editor"];
}
if(isset($_POST["ext"])){
	$ext=$_POST["ext"];
}
if(isset($_POST["year"])){
	$year=$_POST["year"];
}
if(isset($_POST["imagen"])){
	$imagen=$_POST["imagen"];
}
if(isset($_POST["contenido"])){
	$contenido=$_POST["contenido"];
}
if(isset($_POST["publicado"])){
	$publicado=$_POST["publicado"];
}
$que=mysql_query("UPDATE publicaciones_index SET titulo = '$titulo', genero = '$genero', editor = '$editor', ext = '$ext', year = '$year', imagen = '$imagen', contenido = '$contenido', publicado = '$publicado' WHERE id = '$rubro' ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../publicaciones.php?ruta=if_publicaciones_a.php&capturado=1";</script>';
}
include("style/footer_admin.html");
?>