<?php
session_start();
include_once('classes/conex.php');
$link=Conectarse();
if(isset($_POST["pregunta"])){
	$pregunta=$_POST["pregunta"];
}
if(isset($_POST["quiz"])){
	$quiz=$_POST["quiz"];
}
if(isset($_POST["contenido"])){
	$contenido=$_POST["contenido"];
}
$path='../../../images/encuesta/';
//datos del arhivo 
$nombre_archivo = $_FILES['imagen']['name']; 
$tipo_archivo = $_FILES['imagen']['type']; 
$tamano_archivo = $_FILES['imagen']['size']; 
//compruebo si las características del archivo son las que deseo 

if(empty($nombre_archivo)){
$que=mysql_query("INSERT INTO quiz_ques (pregunta,quiz,contenido) VALUES ('{$pregunta}','{$quiz}','{$contenido}')",$link);
			if(!$que){
				die ("Pos no se capturó el contenido, parece que: " .mysql_error());
				echo '<script>window.location.href="../../quiz.php?ruta=if_ques.php&capturado=0";</script>';				
			}else{
			echo 	'<script>window.location.href="../../quiz.php?ruta=if_ques.php&capturado=1";</script>';
			}
}else{  //!empty($nombre_archivo), por supuesto!!	
	if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1500000))) { 
			echo '<script>window.location.href="../../quiz.php?ruta=if_ques.php&capturado=2";</script>';  
	}else{ 
	   	if (move_uploaded_file($_FILES['imagen']['tmp_name'], $path.$nombre_archivo)){ 
			$que=mysql_query("INSERT INTO quiz_ques (pregunta,quiz,imagen,contenido) VALUES ('{$pregunta}','{$quiz}','{$nombre_archivo}','{$contenido}')",$link);
					if(!$que){
						die ("Pos no se capturó el contenido, parece que: " .mysql_error());
						echo '<script>window.location.href="../../quiz.php?ruta=if_ques.php&capturado=0";</script>';				
					}else{
					echo 	'<script>window.location.href="../../quiz.php?ruta=if_ques.php&capturado=1";</script>';
					}
		}
	}
}
?>