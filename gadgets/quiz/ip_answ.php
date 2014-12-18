<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
if(isset($_POST["rubro"])){
	$rubro=$_POST["rubro"];
}
if(isset($_POST["respuesta"])){
	$respuesta=$_POST["respuesta"];
}
if(isset($_POST["valida"])){
	$valida=$_POST["valida"];
}
if(isset($_POST["ques"])){
	$ques=$_POST["ques"];
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
$que=mysql_query("INSERT INTO quiz_answ (respuesta,valida,ques,contenido) VALUES ('{$respuesta}','{$valida}','{$ques}','{$contenido}')",$link);
			if(!$que){
				die ("Pos no se capturó el contenido, parece que: " .mysql_error());
				echo '<script>window.location.href="../../quiz.php?ruta=if_answ.php&capturado=0";</script>';				
			}else{
			echo 	'<script>window.location.href="../../quiz.php?ruta=if_answ.php&capturado=1";</script>';
			}
}else{  //!empty($nombre_archivo), por supuesto!!	
	if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1500000))) { 
			echo '<script>window.location.href="../../quiz.php?ruta=if_answ.php&capturado=2";</script>';  
	}else{ 
	   	if (move_uploaded_file($_FILES['imagen']['tmp_name'], $path.$nombre_archivo)){ 
			$que=mysql_query("INSERT INTO quiz_answ (respuesta,valida,ques,imagen,contenido) VALUES ('{$respuesta}','{$valida}','{$ques}','{$nombre_archivo}','{$contenido}')",$link);
					if(!$que){
						die ("Pos no se capturó el contenido, parece que: " .mysql_error());
						echo '<script>window.location.href="../../quiz.php?ruta=if_answ.php&capturado=0";</script>';				
					}else{
					echo 	'<script>window.location.href="../../quiz.php?ruta=if_answ.php&capturado=1";</script>';
					}
		}
	}
}
?>