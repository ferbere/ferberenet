<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
$nombre=$_POST['nombre'];

$sql=mysql_query("SELECT url,pagina FROM template_general",$link);
$url=mysql_fetch_array($sql);
if($url[1]==''){
	$path=$url[0].'/'.$_SESSION['admin'].'/images/banners/';
}else{
	$path=$url[0].'/'.$url[1].'/'.$_SESSION['admin'].'/images/banners/';
}

//datos del arhivo 
$nombre_archivo = $_FILES['imagen']['name']; 
$tipo_archivo = $_FILES['imagen']['type']; 
$tamano_archivo = $_FILES['imagen']['size']; 
//compruebo si las características del archivo son las que deseo 
if(empty($nombre_archivo)){
	$que=mysql_query("INSERT INTO banners_dir (nombre) values ('{$nombre}')",$link);
	if(!$que){
		die ("Pos no se capturó el contenido, parece que: " .mysql_error());
		echo '<script>window.location.href="../../banners.php?ruta=if_maqueta.php&capturado=0";</script>';				
	}else{
	echo 	'<script>window.location.href="../../banners.php?ruta=if_maqueta.php&capturado=1";</script>';
	}
}else{  //!empty($nombre_archivo), por supuesto!!	
	if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1500000))) { 
			echo '<script>window.location.href="../../banners.php?ruta=if_maqueta.php&capturado=2";</script>';  
	}else{ 
	   	if (move_uploaded_file($_FILES['imagen']['tmp_name'], $path.$nombre_archivo)){ 
			$mysql=mysql_query("INSERT INTO banners_dir (nombre,imagen) values ('{$nombre}','{$nombre_archivo}')",$link);
			if(!$que){
				die ("Pos no se capturó el contenido, parece que: " .mysql_error());
				echo '<script>window.location.href="../../banners.php?ruta=if_maqueta.php&capturado=0";</script>';				
			}else{
			echo 	'<script>window.location.href="../../banners.php?ruta=if_maqueta.php&capturado=1";</script>';
			}
		}
	}
}
?>