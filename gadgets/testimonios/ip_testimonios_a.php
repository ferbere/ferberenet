<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
if(isset($_POST["rubro"])){
	$rubro=$_POST["rubro"];
}
if(isset($_POST["titulo"])){
	$titulo=$_POST["titulo"];
}
if(isset($_POST["imagen"])){
	$imagen=$_POST["imagen"];
}
if(isset($_POST["visible"])){
	$visible=$_POST["visible"];
}
if(isset($_POST["contenido"])){
	$contenido=$_POST["contenido"];
}
/*if(isset($_POST["orden"])){
$orden=$_POST["orden"];
}*/
$que=mysql_query("UPDATE testimonios_index SET titulo = '$titulo',imagen = '$imagen', visible = '$visible', contenido = '$contenido' WHERE id = '$rubro'",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../testimonios.php?ruta=if_testimonios_a.php&capturado=1";</script>';
}
?>