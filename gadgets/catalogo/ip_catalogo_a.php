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
if(isset($_POST["categoria"])){
	$categoria=$_POST["categoria"];
}
if(isset($_POST["descripcion"])){
	$descripcion=$_POST["descripcion"];
}
if(isset($_POST["visible"])){
	$visible=$_POST["visible"];
}
if(isset($_POST["precio_baja"])){
	$precio_baja=$_POST["precio_baja"];
}
if(isset($_POST["existe"])){
	$existe=$_POST["existe"];
}
if(isset($_POST["precio"])){
	$precio=$_POST["precio"];
}
if(isset($_POST["dimensiones"])){
	$dimensiones=$_POST["dimensiones"];
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
echo $path;

if(empty($nombre_archivo)){
$que=mysql_query("UPDATE catalogo_index SET nombre = '$nombre', subnombre = '$subnombre', categoria = '$categoria', descripcion = '$descripcion', visible='$visible', existe='$existe',precio='$precio', dimensiones='$dimensiones', orden='$orden' WHERE id = '$rubro'",$link);
	if(!$que){
		die ("Pos no se capturó el contenido, parece que: " .mysql_error());
		echo '<script>window.location.href="../../catalogo.php?ruta=if_catalogo.php&capturado=0";</script>';				
	}else{
		echo	'<script>window.location.href="../../catalogo.php?ruta=if_catalogo_a.php&capturado=1";</script>';
	}
}else{// O sea, !emty($nombre_archivo), por supuesto!!
	if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1500000))) { 
			echo '<script>window.location.href="../../catalogo.php?ruta=if_catalogo.php&capturado=2";</script>';  
	}else{ 
	   	if(move_uploaded_file($_FILES['imagen']['tmp_name'], $path.$nombre_archivo)){ 
		$que=mysql_query("UPDATE catalogo_index SET nombre = '$nombre', subnombre = '$subnombre', categoria = '$categoria', descripcion = '$descripcion', imagen = '$nombre_archivo', visible='$visible', existe='$existe',precio='$precio', dimensiones='$dimensiones', orden='$orden' WHERE id = '$rubro'",$link);
			if(!$que){
				die ("Pos no se capturó el contenido, parece que: " .mysql_error());
				echo '<script>window.location.href="../../catalogo.php?ruta=if_catalogo.php&capturado=0";</script>';				
			}else{
				echo	'<script>window.location.href="../../catalogo.php?ruta=if_catalogo_a.php&capturado=1";</script>';
			}
		}else{
			echo 'Chanfle, esto sigue mal';
		}
	}
}
?>