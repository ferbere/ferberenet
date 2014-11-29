<?php
session_start();
include_once('../../classes/mysql.php');
$mysql= new MySQL();

if(isset($_GET['rubro'])){
	$rubro = $_GET['rubro'];
}
if(isset($_GET['pieza'])){
	$pieza = $_GET['pieza'];
}
$sql=$mysql->consulta("SELECT label,pieza FROM catalogo_asigna WHERE label = '$rubro' AND pieza = '$pieza'");
$cuenta=$mysql->num_rows($sql);
if($cuenta<=0){
	$sql_asi=$mysql->consulta("INSERT INTO catalogo_asigna (label,pieza) VALUES ('{$rubro}','{$pieza}')");
	if(!$sql_asi){
		die ("Pos no se agregó la ".$pieza." a la etiqueta ".$rubro.", parece que: " .mysql_error());
	}else{
		echo '<script>window.location.href="../../catalogo.php?ruta=bus_asigna.php&rubro='.$rubro.'";</script>';
	}
}else{
	$sql_desasi=$mysql->consulta("DELETE FROM catalogo_asigna WHERE label = '$rubro' AND pieza = '$pieza'");
}
if(!$sql_desasi){
	die ("Pos no se borró la ".$pieza." de la etiqueta ".$rubro.", parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../catalogo.php?ruta=bus_asigna.php&rubro='.$rubro.'";</script>';
}
?>