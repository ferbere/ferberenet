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
if(isset($_POST["nombre"])){
	$nombre=$_POST["nombre"];
}
if(isset($_POST["imagen"])){
	$imagen=$_POST["imagen"];
}
if(isset($_POST["idioma"])){
	$idioma=$_POST["idioma"];
}
if(isset($_POST["vinculo"])){
	$vinculo=$_POST["vinculo"];
}
if(isset($_POST["contenido"])){
	$contenido=$_POST["contenido"];
}
if(isset($_POST["visible"])){
	$visible=$_POST["visible"];
}
$que=mysql_query("UPDATE language_content SET titulo = '$titulo',subtitulo = '$subtitulo', nombre = '$nombre',imagen = '$imagen', idioma = '$idioma', vinculo = '$vinculo', contenido = '$contenido', visible = '$visible' WHERE id = '$rubro'",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../language.php?ruta=if_content_a.php&capturado=1";</script>';
}
?>