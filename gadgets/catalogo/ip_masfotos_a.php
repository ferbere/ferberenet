<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_POST["rubro"])){
	$rubro=$_POST["rubro"];
}
if(isset($_POST["nombre"])){
	$nombre=$_POST["nombre"];
}
if(isset($_POST["descripcion"])){
	$descripcion=$_POST["descripcion"];
}
if(isset($_POST["visible"])){
	$visible=$_POST["visible"];
}
if(isset($_POST["vincula"])){
	$vincula=$_POST["vincula"];
}
if(isset($_POST["orden"])){
	$orden=$_POST["orden"];
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
	$que=mysql_query("UPDATE catalogo_masfotos SET nombre = '$nombre', descripcion = '$descripcion', visible='$visible', vincula='$vincula',orden='$orden' WHERE id = '$rubro'",$link);
	if(!$que){
		die ("Pos no se capturó el contenido, parece que: " .mysql_error());
		echo '<script>window.location.href="../../catalogo.php?ruta=if_masfotos_a.php&capturado=0";</script>';				
	}else{
		echo	'<script>window.location.href="../../catalogo.php?ruta=if_masfotos_a.php&capturado=1";</script>';
	}
}else{// O sea, !emty($nombre_archivo), por supuesto!!
	if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1500000))) { 
			echo '<script>window.location.href="../../catalogo.php?ruta=if_masfotos_a.php&capturado=2";</script>';  
	}else{
	   	if(move_uploaded_file($_FILES['imagen']['tmp_name'], $path.$nombre_archivo)){ 
		$que=mysql_query("UPDATE catalogo_masfotos SET nombre = '$nombre',descripcion = '$descripcion', imagen = '$nombre_archivo', visible='$visible', vincula='$vincula', orden='$orden' WHERE id = '$rubro'",$link);
			if(!$que){
				die ("Pos no se capturó el contenido, parece que: " .mysql_error());
				echo '<script>window.location.href="../../catalogo.php?ruta=if_masfotos_a.php&capturado=0";</script>';				
			}else{
				echo	'<script>window.location.href="../../catalogo.php?ruta=if_masfotos_a.php&capturado=1";</script>';
			}
		}else{
			echo 'Chanfle, esto sigue mal';
		}
		
	}
}
?>