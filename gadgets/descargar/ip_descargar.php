<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();

$visible=$_POST['visible'];
$disponible=$_POST['disponible'];

$path='../../../images/descargas/';
//datos del arhivo 
$nombre_archivo = $_FILES['imagen']['name']; 
$tipo_archivo = $_FILES['imagen']['type']; 
$tamano_archivo = $_FILES['imagen']['size']; 
//compruebo si las características del archivo son las que deseo 
if(empty($nombre_archivo)){
	$mysql=mysql_query("INSERT INTO descargar_index (imagen,visible,disponible) values ('{$imagen}','{$visible}','{$disponible}')",$link);
	if(!$mysql){
		die ("Pos no se capturó el contenido, parece que: " .mysql_error());
		echo '<script>window.location.href="../../descargar.php?ruta=if_descargar.php&capturado=0";</script>';
		}else{
			echo 	'<script>window.location.href="../../descargar.php?ruta=if_descargar.php&capturado=1";</script>';
		}
}else{  //!empty($nombre_archivo), por supuesto!!	
	if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1500000))) { 
		echo '<script>window.location.href="../../descargar.php?ruta=if_descargar.php&capturado=2";</script>';  
	}else{ 
	   	if (move_uploaded_file($_FILES['imagen']['tmp_name'], $path.$nombre_archivo)){ 
			$mysql=mysql_query("INSERT INTO descargar_index (imagen,visible,disponible) values ('{$nombre_archivo}','{$visible}','{$disponible}')",$link);
			if(!$mysql){
				die ("Pos no se capturó el contenido, parece que: " .mysql_error());
				echo '<script>window.location.href="../../descargar.php?ruta=if_descargar.php&capturado=0";</script>';				
			}else{
					echo 	'<script>window.location.href="../../descargar.php?ruta=if_descargar.php&capturado=1";</script>';
			}
		}
	}
}
?>
?>