<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();

$nombre=$_POST["nombre"];
$pregunta=$_POST["pregunta"];
$respuesta=$_POST["respuesta"];
$categoria=$_POST["categoria"];
$visible=$_POST["visible"];

$que=mysql_query("INSERT INTO faq_index (nombre,pregunta,respuesta,categoria,visible) values ('{$nombre}','{$pregunta}','{$respuesta}','{$categoria}','{$visible}') ",$link);
if(!$que){
	die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo 	'<script>window.location.href="../../faq.php?ruta=if_faq.php&capturado=1";</script>';
}
?>