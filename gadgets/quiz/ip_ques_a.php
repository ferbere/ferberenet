<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_POST["rubro"])){
	$rubro=$_POST["rubro"];
}
if(isset($_POST["pregunta"])){
	$pregunta=$_POST["pregunta"];
}
if(isset($_POST["quiz"])){
	$quiz=$_POST["quiz"];
}
if(isset($_POST["contenido"])){
	$contenido=$_POST["contenido"];
}
$sql=mysql_query("SELECT url,pagina FROM template_general",$link);
$url=mysql_fetch_array($sql);
if($url[1]==''){
	$path=$url[0].'/'.$_SESSION['admin'].'/images/encuestas/';
}else{
	$path=$url[0].'/'.$url[1].'/'.$_SESSION['admin'].'/images/encuestas/';
}

//datos del arhivo 
$nombre_archivo = $_FILES['imagen']['name']; 
$tipo_archivo = $_FILES['imagen']['type']; 
$tamano_archivo = $_FILES['imagen']['size']; 
//compruebo si las características del archivo son las que deseo 

if(empty($nombre_archivo)){
$que=mysql_query("UPDATE quiz_ques SET pregunta='$pregunta',quiz='$quiz',contenido='$contenido' WHERE id = '$rubro' ",$link);
	if(!$que){
		die ("Pos no se capturó el contenido, parece que: " .mysql_error());
		echo '<script>window.location.href="../../quiz.php?ruta=if_ques_a.php&capturado=0";</script>';				
	}else{
		echo	'<script>window.location.href="../../quiz.php?ruta=if_quiz_a.php&capturado=1";</script>';
	}
}else{// O sea, !emty($nombre_archivo), por supuesto!!
	if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1500000))) { 
			echo '<script>window.location.href="../../quiz.php?ruta=if_ques_a.php&capturado=2";</script>';  
	}else{ 
	   	if(move_uploaded_file($_FILES['imagen']['tmp_name'], $path.$nombre_archivo)){ 
			$que=mysql_query("UPDATE quiz_ques SET pregunta='$pregunta',quiz='$quiz',imagen='$nombre_archivo',contenido='$contenido' WHERE id = '$rubro' ",$link);
 			if(!$que){
				die ("Pos no se capturó el contenido, parece que: " .mysql_error());
				echo '<script>window.location.href="../../quiz.php?ruta=if_ques_a.php&capturado=0";</script>';				
			}else{
				echo	'<script>window.location.href="../../quiz.php?ruta=if_quiz_a.php&capturado=1";</script>';
			}
		}
	}
}
?>