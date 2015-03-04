<?php
include_once('../../classes/mysql.php');
$mysql=new MySQL();
if(isset($_POST["ruta"])){
	$ruta=$_POST["ruta"];
}
if(isset($_POST["rubro"])){
	$rubro=$_POST["rubro"];
}
if(isset($_POST["nombre"])){
	$nombre=$_POST["nombre"];
}
if(isset($_POST["pregunta"])){
	$pregunta=$_POST["pregunta"];
}
if(isset($_POST["respuesta"])){
	$respuesta=$_POST["respuesta"];
}
if(isset($_POST["categoria"])){
	$categoria=$_POST["categoria"];
}
if(isset($_POST["visible"])){
	$visible=$_POST["visible"];
}
echo $rubro.'<br>';
echo $pregunta.'<br>';
echo $respuesta.'<br>';
echo $categoria.'<br>';
echo $visible.'<br>';
$que=$mysql->consulta("UPDATE faq_index SET nombre = '$nombre', pregunta = '$pregunta', respuesta = '$respuesta',categoria = '$categoria',visible = '$visible' WHERE id = '$rubro'");
if(!$que){
	die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../faq.php?ruta=if_faq_a.php&rubro='.$rubro.'&capturado=1";</script>';
}
?>