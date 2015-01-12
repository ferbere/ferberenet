<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_POST["rubro"])){
	$rubro=$_POST["rubro"];
}
if(isset($_POST["numero"])){
	$numero=$_POST["numero"];
}
if(isset($_POST["desde"])){
	$desde=$_POST["desde"];
}
if(isset($_POST["hasta"])){
	$hasta=$_POST["hasta"];
}
if(isset($_POST["visible"])){
	$visible=$_POST["visible"];
}

$que=mysql_query("UPDATE prospecta_edicion SET numero = '$numero', desde = '$desde', hasta = '$hasta', visible = '$visible'  WHERE id = '$rubro'",$link);
if(!$que){
	die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../prospecta.php?ruta=if_edicion_a.php&capturado=1";</script>';
}
?>