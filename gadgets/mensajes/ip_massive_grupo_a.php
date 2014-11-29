<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();

if(isset($_POST['rubro'])){
	$rubro=$_POST['rubro'];	
}
if(isset($_POST['nombre'])){
	$nombre=$_POST['nombre'];	
}
if(isset($_POST['imagen'])){
	$imagen=$_POST['imagen'];
}
if(isset($_POST['descripcion'])){
	$descripcion=$_POST['descripcion'];	
}

$mysql=mysql_query("UPDATE mails_massive_grupo SET  nombre = '$nombre',imagen = '$imagen',descripcion = '$descripcion' WHERE id = '$rubro'" ,$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../mensajes.php?ruta=if_massive_grupo_a.php&capturado=1";</script>';
}
?>