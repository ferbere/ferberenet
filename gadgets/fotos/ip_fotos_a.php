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
if(isset($_POST["subnombre"])){
	$subnombre=$_POST["subnombre"];
}
if(isset($_POST["fecha"])){
	$fecha=$_POST["fecha"];
}
if(isset($_POST["categoria"])){
	$categoria=$_POST["categoria"];
}
if(isset($_POST["descripcion"])){
	$descripcion=$_POST["descripcion"];
}
if(isset($_POST["visible"])){
	$visible=$_POST["visible"];
}

$sql=mysql_query("SELECT url FROM template_general",$link);
$url=mysql_fetch_array($sql);
$path=$url[0].'/'.$_SESSION['admin'].'/images/articulos/';
//datos del arhivo 
$nombre_archivo = $_FILES['imagen']['name']; 
$tipo_archivo = $_FILES['imagen']['type']; 
$tamano_archivo = $_FILES['imagen']['size']; 
//compruebo si las características del archivo son las que deseo 

if(empty($nombre_archivo)){
	$que=mysql_query("UPDATE fotos_index SET nombre = '$nombre', subnombre = '$subnombre',fecha = '$fecha', categoria = '$categoria', descripcion = '$descripcion', visible='$visible' WHERE id = '$rubro'",$link);
			if(!$que){
				die ("Pos no se capturó el contenido, parece que: " .mysql_error());
				echo '<script>window.location.href="../../fotos.php?ruta=if_fotos.php&capturado=0";</script>';				
			}else{
				echo	'<script>window.location.href="../../fotos.php?ruta=if_fotos_a.php&capturado=1";</script>';
			}
}else{// O sea, !emty($nombre_archivo), por supuesto!!
	if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1500000))) { 
			echo '<script>window.location.href="../../fotos.php?ruta=if_fotos.php&capturado=2";</script>';  
	}else{ 
	   	if(move_uploaded_file($_FILES['imagen']['tmp_name'], $path.$nombre_archivo)){ 

	$que=mysql_query("UPDATE fotos_index SET nombre = '$nombre', subnombre = '$subnombre',fecha = '$fecha', categoria = '$categoria', descripcion = '$descripcion', imagen = '$nombre_archivo', visible='$visible' WHERE id = '$rubro'",$link);
			if(!$que){
				die ("Pos no se capturó el contenido, parece que: " .mysql_error());
				echo '<script>window.location.href="../../fotos.php?ruta=if_fotos.php&capturado=0";</script>';				
			}else{
				echo	'<script>window.location.href="../../fotos.php?ruta=if_fotos_a.php&capturado=1";</script>';
			}
		}
	}
}
?>