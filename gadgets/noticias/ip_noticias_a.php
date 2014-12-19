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
if(isset($_POST["fecha"])){
	$fecha=$_POST["fecha"];
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
if(isset($_POST["categoria"])){
	$categoria=$_POST["categoria"];
}

$path='../../../images/noticias/';
//datos del arhivo 
$nombre_archivo = $_FILES['imagen']['name']; 
$tipo_archivo = $_FILES['imagen']['type']; 
$tamano_archivo = $_FILES['imagen']['size']; 
//compruebo si las características del archivo son las que deseo 

if(empty($nombre_archivo)){
	$que=mysql_query("UPDATE noticias_index SET titulo = '$titulo', subtitulo = '$subtitulo', fecha = '$fecha', publicado = '$publicado', contenido = '$contenido', orden = '$orden', categoria = '$categoria'  WHERE id = '$rubro'",$link);
	if(!$que){
		die ("Pos no se capturó el contenido, parece que: " .mysql_error());
		echo '<script>window.location.href="../../noticias.php?ruta=if_noticias.php&capturado=0";</script>';				
	}else{
		echo	'<script>window.location.href="../../noticias.php?ruta=if_noticias_a.php&capturado=1";</script>';
	}
}else{// O sea, !emty($nombre_archivo), por supuesto!!
	if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1500000))) { 
			echo '<script>window.location.href="../../noticias.php?ruta=if_noticias.php&capturado=2";</script>';  
	}else{ 
	   	if(move_uploaded_file($_FILES['imagen']['tmp_name'], $path.$nombre_archivo)){ 
			$que=mysql_query("UPDATE noticias_index SET titulo = '$titulo', subtitulo = '$subtitulo', imagen = '$nombre_archivo', fecha = '$fecha', publicado = '$publicado', contenido = '$contenido', orden = '$orden', categoria = '$categoria'  WHERE id = '$rubro'",$link);
			if(!$que){
				die ("Pos no se capturó el contenido, parece que: " .mysql_error());
				echo '<script>window.location.href="../../noticias.php?ruta=if_noticias.php&capturado=0";</script>';				
			}else{
				echo	'<script>window.location.href="../../noticias.php?ruta=if_noticias_a.php&capturado=1";</script>';
			}
		}
	}
}
?>