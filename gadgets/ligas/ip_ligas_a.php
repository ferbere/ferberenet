<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
if(isset($_POST["rubro"])){
	$rubro=$_POST["rubro"];
}
if(isset($_POST["nombre"])){
	$nombre=$_POST["nombre"];
}
if(isset($_POST["ruta"])){
	$ruta=$_POST["ruta"];
}
if(isset($_POST["contenido"])){
	$contenido=$_POST["contenido"];
}
if(isset($_POST["imagen"])){
	$imagen=$_POST["imagen"];
}
if(isset($_POST["visible"])){
	$visible=$_POST["visible"];
}

$que=mysql_query("UPDATE ligas_index SET nombre = '$nombre', ruta = '$ruta', imagen = '$imagen', contenido = '$contenido', visible = '$visible'  WHERE id = '$rubro'",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../ligas.php?ruta=if_ligas_a.php&capturado=1";</script>';
}
?>