<?php
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_POST["rubro"])){
	$rubro=$_POST["rubro"];
}
if(isset($_POST["nombre"])){
	$nombre=$_POST["nombre"];
}
if(isset($_POST["perfil"])){
	$perfil=$_POST["perfil"];
}
if(isset($_POST["curri"])){
	$curri=$_POST["curri"];
}

$que=mysql_query("UPDATE agenda_imparte SET nombre='$nombre', perfil = '$perfil', curri = '$curri' WHERE id = '$rubro' ",$link);
if(!$que){
	die ("Pos no se captur� el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../agenda.php?ruta=if_imparte_a.php&capturado=1";</script>';
}
?>
