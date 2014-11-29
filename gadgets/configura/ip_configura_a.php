<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_POST["titulo"])){
	$titulo=$_POST["titulo"];
}
if(isset($_POST["subtitulo"])){
	$subtitulo=$_POST["subtitulo"];
}
if(isset($_POST["pagina"])){
	$pagina=$_POST["pagina"];
}
if(isset($_POST["url"])){
	$url=$_POST["url"];
}
if(isset($_POST["dia"])){
	$dia=$_POST["dia"];
}
if(isset($_POST["noche"])){
	$noche=$_POST["noche"];
}
if(isset($_POST["correo1"])){
	$correo1=$_POST["correo1"];
}
if(isset($_POST["metatags"])){
	$metatags=$_POST["metatags"];
}
$que=mysql_query("UPDATE template_general SET titulo = '$titulo', subtitulo = '$subtitulo',pagina='$pagina',url='$url', dia = '$dia', noche = '$noche', correo1 = '$correo1', metatags = '$metatags' ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../configura.php?ruta=if_configura_a.php&capturado=1";</script>';
}
?>