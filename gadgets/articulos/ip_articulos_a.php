<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_POST["rubro"])){
	$rubro=$_POST["rubro"];
}
if(isset($_POST['cuenta'])){
	$cuenta=$_POST['cuenta'];	
}
if(isset($_POST["categoria"])){
	$categoria=$_POST["categoria"];
}
if(isset($_POST["titulo"])){
	$titulo=$_POST["titulo"];
}
if(isset($_POST["subtitulo"])){
	$subtitulo=$_POST["subtitulo"];
}
if(isset($_POST["contenido"])){
	$contenido=$_POST["contenido"];
}
if(isset($_POST["publicado"])){
	$publicado=$_POST["publicado"];
}
if(isset($_POST["autor"])){
	$autor=$_POST["autor"];
}
foreach($_POST['tag'] as $valor){
	$tag[$valor]= 1;
}
for($i=1;$i<=$cuenta;$i++){
	if($tag[$i]!=1){
		$tag[$i]=0;
	}
	$chain .=$tag[$i];
}
//echo $chain.'<br>';
$tag=bindec($chain);
//echo $tag;

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
//compruebo si las caracterÝsticas del archivo son las que deseo 

if(empty($nombre_archivo)){
$que=mysql_query("UPDATE articulos_index SET categoria = '$categoria',titulo = '$titulo', subtitulo = '$subtitulo', contenido = '$contenido', publicado = '$publicado', autor = '$autor',tag = '$tag' WHERE id = '$rubro'",$link);
	if(!$que){
		die ("Pos no se capturˇ el contenido, parece que: " .mysql_error());
		echo '<script>window.location.href="../../articulos.php?ruta=if_articulos.php&capturado=0";</script>';				
	}else{
		echo	'<script>window.location.href="../../articulos.php?ruta=if_articulos_a.php&capturado=1";</script>';
	}
}else{// O sea, !emty($nombre_archivo), por supuesto!!
	if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1500000))) { 
			echo '<script>window.location.href="../../articulos.php?ruta=if_articulos.php&capturado=2";</script>';  
	}else{ 
	   	if(move_uploaded_file($_FILES['imagen']['tmp_name'], $path.$nombre_archivo)){ 
			$que=mysql_query("UPDATE articulos_index SET categoria = '$categoria',titulo = '$titulo', subtitulo = '$subtitulo', contenido = '$contenido', publicado = '$publicado', autor = '$autor', imagen = '$nombre_archivo',tag = '$tag' WHERE id = '$rubro'",$link);
			if(!$que){
				die ("Pos no se capturˇ el contenido, parece que: " .mysql_error());
				echo '<script>window.location.href="../../articulos.php?ruta=if_articulos.php&capturado=0";</script>';				
			}else{
				echo	'<script>window.location.href="../../articulos.php?ruta=if_articulos_a.php&capturado=1";</script>';
			}
		}
	}
}
?>