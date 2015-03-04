<?php
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_POST["ruta"])){
	$ruta=$_POST["ruta"];
}
if(isset($_POST["rubro"])){
	$rubro=$_POST["rubro"];
}
if(isset($_POST["titulo"])){
	$titulo=$_POST["titulo"];
}
if(isset($_POST["subtitulo"])){
	$subtitulo=$_POST["subtitulo"];
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
//compruebo si las características del archivo son las que deseo 

if(empty($nombre_archivo)){
$sql=mysql_query("UPDATE corporativa_index SET titulo = '$titulo', subtitulo = '$subtitulo', publicado = '$publicado', contenido = '$contenido', orden = '$orden'  WHERE id = '$rubro'",$link);
	if(!$sql){
		die ("Pos no se capturó el contenido, parece que: " .mysql_error());
		echo '<script>window.location.href="../../corporativa.php?ruta=if_corporativa.php&capturado=0";</script>';				
	}else{
		echo 	'<script>window.location.href="../../corporativa.php?ruta=if_corporativa.php&capturado=1";</script>';
	}
}else{  //!empty($nombre_archivo), por supuesto!!	
	if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1500000))) { 
			echo '<script>window.location.href="../../corporativa.php?ruta=if_corporativa.php&capturado=2";</script>';  
	}else{ 
	   	if (move_uploaded_file($_FILES['imagen']['tmp_name'], $path.$nombre_archivo)){ 
			$sql=mysql_query("UPDATE corporativa_index SET titulo = '$titulo', subtitulo = '$subtitulo', imagen = '$nombre_archivo', publicado = '$publicado', contenido = '$contenido', orden = '$orden'  WHERE id = '$rubro'",$link);
					if(!$sql){
						die ("Pos no se capturó el contenido, parece que: " .mysql_error());
						echo '<script>window.location.href="../../corporativa.php?ruta=if_corporativa.php&capturado=0";</script>';				
					}else{
					echo 	'<script>window.location.href="../../corporativa.php?ruta=if_corporativa.php&capturado=1";</script>';
					}
		}
	}
}
?>