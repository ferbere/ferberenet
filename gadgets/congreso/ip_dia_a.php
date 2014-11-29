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

$que=mysql_query("UPDATE congreso_dia SET nombre='$nombre' WHERE id = '$rubro' ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../congreso.php?ruta=if_dia_a.php&capturado=1";</script>';
}
?>