<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_POST['rubro'])){
$rubro=$_POST['rubro'];
}
if(isset($_POST['visible'])){
$visible=$_POST['visible'];
}
if(isset($_POST['disponible'])){
$disponible=$_POST['disponible'];
}

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

if(empty($nombre_archivo)){//Supuesto 1
$mysql=mysql_query("UPDATE descargar_index SET visible='$visible', disponible='$disponible' WHERE id = '$rubro' ",$link);
	if(!$mysql){
		die ("Pos no se capturó el supuesto 1, parece que: " .mysql_error());
		echo '<script>window.location.href="../../descargar.php?ruta=if_descargar.php&capturado=0";</script>';				
	}else{
		echo	'<script>window.location.href="../../descargar.php?ruta=if_descargar_a.php&capturado=1";</script>';
	}
}else{// Supuesto 2
	if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1500000))) { 
			echo '<script>window.location.href="../../descargar.php?ruta=if_descargar.php&capturado=2";</script>';  
	}else{ 
	   	if(move_uploaded_file($_FILES['imagen']['tmp_name'], $path.$nombre_archivo)){ 
			$mysql=mysql_query("UPDATE descargar_index SET imagen='$nombre_archivo',visible='$visible', disponible='$disponible' WHERE id = '$rubro' ",$link);

			if(!$mysql){
				die ("Pos no se capturó el Supuesto 2, parece que: " .mysql_error());
				echo '<script>window.location.href="../../descargar.php?ruta=if_descargar.php&capturado=0";</script>';				
			}else{
				echo	'<script>window.location.href="../../descargar.php?ruta=if_descargar_a.php&capturado=1";</script>';
			}
		}
	}
}
?>