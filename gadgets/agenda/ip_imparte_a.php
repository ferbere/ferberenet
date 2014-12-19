<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
if(isset($_POST["rubro"])){
	$rubro=$_POST["rubro"];
}
if(isset($_POST["imparte"])){
	$imparte=$_POST["imparte"];
}
if(isset($_POST["perfil"])){
	$perfil=$_POST["perfil"];
}
if(isset($_POST["curri"])){
	$curri=$_POST["curri"];
}

$que=mysql_query("UPDATE imparte SET imparte='$imparte', perfil = '$perfil', curri = '$curri' WHERE id = '$rubro' ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../congreso.php?ruta=if_imparte_a.php&capturado=1";</script>';
}
?>