<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();

$titulo=$_POST["titulo"];
$subtitulo=$_POST["subtitulo"];
$contenido=$_POST["contenido"];
$publicado=$_POST["publicado"];
$autor=$_POST["autor"];

$sql=mysql_query("SELECT url,pagina FROM template_general",$link);
$url=mysql_fetch_array($sql);
if($url[1]==''){
	$path=$url[0].'/'.$_SESSION['admin'].'/images/corporativa/';
}else{
	$path=$url[0].'/'.$url[1].'/'.$_SESSION['admin'].'/images/corporativa/';
}

//datos del arhivo 
$nombre_archivo = $_FILES['imagen']['name']; 
$tipo_archivo = $_FILES['imagen']['type']; 
$tamano_archivo = $_FILES['imagen']['size']; 
//compruebo si las caracterÝsticas del archivo son las que deseo 

if(empty($nombre_archivo)){
$sql=mysql_query("INSERT INTO corporativa_index (titulo,subtitulo,contenido,publicado,autor) VALUES ('{$titulo}','{$subtitulo}','{$contenido}','{$publicado}','{$autor}') ",$link);
	if(!$sql){
		die ("Pos no se capturˇ el contenido, parece que: " .mysql_error());
		echo '<script>window.location.href="../../corporativa.php?ruta=if_corporativa.php&capturado=0";</script>';				
	}else{
		echo 	'<script>window.location.href="../../corporativa.php?ruta=if_corporativa.php&capturado=1";</script>';
	}
}else{  //!empty($nombre_archivo), por supuesto!!	
	if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1500000))) { 
			echo '<script>window.location.href="../../corporativa.php?ruta=if_corporativa.php&capturado=2";</script>';  
	}else{ 
	   	if (move_uploaded_file($_FILES['imagen']['tmp_name'], $path.$nombre_archivo)){ 
			$sql=mysql_query("INSERT INTO corporativa_index (titulo,subtitulo,contenido,publicado,autor,imagen) VALUES ('{$titulo}','{$subtitulo}','{$contenido}','{$publicado}','{$autor}','{$nombre_archivo}') ",$link);
				if(!$sql){
					die ("Pos no se capturˇ el contenido, parece que: " .mysql_error());
						echo '<script>window.location.href="../../corporativa.php?ruta=if_corporativa.php&capturado=0";</script>';				
				}else{
					echo 	'<script>window.location.href="../../corporativa.php?ruta=if_corporativa.php&capturado=1";</script>';
					}
		}
	}
}
?>