<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
if(isset($_POST['categoria'])){
	$categoria=$_POST['categoria'];
}
if(isset($_POST['titulo'])){
	$titulo=$_POST['titulo'];
}
if(isset($_POST['subtitulo'])){
	$subtitulo=$_POST['subtitulo'];
}
if(isset($_POST['nombre'])){
	$nombre=$_POST['nombre'];
}
if(isset($_POST['imagen'])){
	$imagen=$_POST['imagen'];
}
if(isset($_POST['idioma'])){
	$idioma=$_POST['idioma'];
}
if(isset($_POST['vinculo'])){
	$vinculo=$_POST['vinculo'];
}
if(isset($_POST['contenido'])){
	$contenido=$_POST['contenido'];
}
if(isset($_POST['visible'])){
	$visible=$_POST['visible'];
}
if(isset($_POST['secc_vincula'])){
	$secc_vincula=$_POST['secc_vincula'];
}

$que=mysql_query("INSERT into language_content (titulo,subtitulo,nombre,imagen,idioma,vinculo,contenido,visible,secc_vincula) values ('{$titulo}','{$subtitulo}','{$nombre}','{$imagen}','{$idioma}','{$vinculo}','{$contenido}','{$visible}','{$secc_vincula}') ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../language.php?ruta=if_content.php&capturado=1";</script>';
}
?>