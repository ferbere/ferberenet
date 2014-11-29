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
if(isset($_POST["subtitulo"])){
	$subtitulo=$_POST["subtitulo"];
}
if(isset($_POST["imagen"])){
	$imagen=$_POST["imagen"];
}
if(isset($_POST["banner"])){
	$banner=$_POST["banner"];
}
if(isset($_POST["publicado"])){
	$publicado=$_POST["publicado"];
}
if(isset($_POST["contenido"])){
	$contenido=$_POST["contenido"];
}
if(isset($_POST["orden"])){
	$orden=$_POST["orden"];
}
/*
if(isset($_POST["autor"])){
$autor=$_POST["autor"];
} */
if(isset($_POST["ruta"])){
	$ruta=$_POST["ruta"];
}
$que=mysql_query("UPDATE noticias_index SET titulo = '$titulo', subtitulo = '$subtitulo', imagen = '$imagen', banner = '$banner', publicado = '$publicado', contenido = '$contenido', ruta = '$ruta', orden = '$orden'  WHERE id = '$rubro'",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo	'<script>window.location.href="../../noticias.php?ruta=if_noticias_a.php&capturado=1";</script>';
}
include("style/footer_admin.html");
?>