<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
$nombre=$_POST['nombre'];
$belong=$_POST['belong'];

$sql=mysql_query("SELECT url,pagina FROM template_general",$link);
$url=mysql_fetch_array($sql);
if($url[1]==''){
	$path=$url[0].'/'.$_SESSION['admin'].'/images/articulos/';
}else{
	$path=$url[0].'/'.$url[1].'/'.$_SESSION['admin'].'/images/articulos/';
}

//datos del arhivo 
$nombre_archivo = $_FILES['imagen']['name']; 
$tipo_archivo = $_FILES['imagen']['type']; 
$tamano_archivo = $_FILES['imagen']['size']; 
//compruebo si las características del archivo son las que deseo 
if(empty($nombre_archivo)){
	$que=mysql_query("INSERT INTO articulos_categoria (nombre,belong) values ('{$nombre}','{$belong}')",$link);
	if(!$que){
		die ("Pos no se capturó el contenido, parece que: " .mysql_error());
		echo '<script>window.location.href="../../articulos.php?ruta=if_categoria.php&capturado=0";</script>';				
	}else{
	echo 	'<script>window.location.href="../../articulos.php?ruta=if_categoria.php&capturado=1";</script>';
	}
}else{  //!empty($nombre_archivo), por supuesto!!	
	if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1500000))) { 
			echo '<script>window.location.href="../../articulos.php?ruta=if_categoria.php&capturado=2";</script>';  
	}else{ 
	   	if (move_uploaded_file($_FILES['imagen']['tmp_name'], $path.$nombre_archivo)){ 
			$que=mysql_query("INSERT INTO articulos_categoria (nombre,imagen,belong) values ('{$nombre}','{$nombre_archivo}','{$belong}')",$link);
			if(!$que){
				die ("Pos no se capturó el contenido, parece que: " .mysql_error());
				echo '<script>window.location.href="../../articulos.php?ruta=if_categoria.php&capturado=0";</script>';				
			}else{
			echo 	'<script>window.location.href="../../articulos.php?ruta=if_categoria.php&capturado=1";</script>';
			}
		}
	}
}
?>