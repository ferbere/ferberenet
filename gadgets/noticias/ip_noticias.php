<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
$titulo=$_POST["titulo"];
$subtitulo=$_POST["subtitulo"];
$contenido=$_POST["contenido"];
$banner=$_POST["banner"];
$publicado=$_POST["publicado"];
$autor=$_POST["autor"];
$imagen=$_POST["imagen"];
$que=mysql_query("INSERT into noticias_index (titulo,subtitulo,contenido,banner,publicado,autor,imagen) values ('{$titulo}','{$subtitulo}','{$contenido}','{$banner}','{$publicado}','{$autor}','{$imagen}') ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../noticias.php?ruta=if_noticias.php&capturado=1";</script>';
}
?>