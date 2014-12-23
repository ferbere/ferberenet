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
if(isset($_POST["contenido"])){
	$contenido=$_POST["contenido"];
}
if(isset($_POST["categoria"])){
	$categoria=$_POST["categoria"];
}
$que=mysql_query("UPDATE codigo_index SET nombre = '$nombre',contenido = '$contenido',categoria = '$categoria'  WHERE id = '$rubro'",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../codigo.php?ruta=if_codigo_a.php&capturado=1";</script>';
}
?>