<?php
session_start();
include_once('../../classes/conex.php');
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
if(isset($_POST['contenido'])){
	$contenido=$_POST['contenido'];
}
if(isset($_POST['publicado'])){
	$publicado=$_POST['publicado'];
}
if(isset($_POST['autor'])){
	$autor=$_POST['autor'];
}
$sql=mysql_query("SELECT url,pagina FROM template_general",$link);
$url=mysql_fetch_array($sql);
$path=$url[0].'/'.$url[1].'/'.$_SESSION['admin'].'/images/catalogo/';

//datos del arhivo 
$nombre_archivo = $_FILES['imagen']['name']; 
$tipo_archivo = $_FILES['imagen']['type']; 
$tamano_archivo = $_FILES['imagen']['size']; 
//compruebo si las características del archivo son las que deseo 
if(empty($nombre_archivo)){
$que=mysql_query("INSERT INTO articulos_index (categoria,titulo,subtitulo,contenido,publicado,autor) values ('{$categoria}','{$titulo}','{$subtitulo}','{$contenido}','{$publicado}','{$autor}') ",$link);
			if(!$que){
				die ("Pos no se capturó el contenido, parece que: " .mysql_error());
				echo '<script>window.location.href="../../articulos.php?ruta=if_articulos.php&capturado=0";</script>';				
			}else{
			echo 	'<script>window.location.href="../../articulos.php?ruta=if_articulos.php&capturado=1";</script>';
			}
}else{  //!empty($nombre_archivo), por supuesto!!	
	if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1500000))) { 
			echo '<script>window.location.href="../../articulos.php?ruta=if_articulos.php&capturado=2";</script>';  
	}else{ 
	   	if (move_uploaded_file($_FILES['imagen']['tmp_name'], $path.$nombre_archivo)){ 
			$que=mysql_query("INSERT INTO articulos_index (categoria,titulo,subtitulo,contenido,publicado,autor,imagen) values ('{$categoria}','{$titulo}','{$subtitulo}','{$contenido}','{$publicado}','{$autor}','{$nombre_archivo}') ",$link);
					if(!$que){
						die ("Pos no se capturó el contenido, parece que: " .mysql_error());
						echo '<script>window.location.href="../../articulos.php?ruta=if_articulos.php&capturado=0";</script>';				
					}else{
					echo 	'<script>window.location.href="../../articulos.php?ruta=if_articulos.php&capturado=1";</script>';
					}
		}
	}
}
?>