<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
$titulo=$_POST["titulo"];
$genero=$_POST["genero"];
$editor=$_POST["editor"];
$ext=$_POST["ext"];
$year=$_POST["year"];
$imagen=$_POST["imagen"];
$contenido=$_POST["contenido"];
$publicado=$_POST["publicado"];
$que=mysql_query("INSERT into publicaciones_index (titulo,genero,editor,ext,year,imagen,contenido,publicado) values ('{$titulo}','{$genero}','{$editor}','{$ext}','{$year}','{$imagen}','{$contenido}','{$publicado}') ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../publicaciones.php?ruta=if_publicaciones.php&capturado=1";</script>';
}
?>