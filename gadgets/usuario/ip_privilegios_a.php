<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_POST['rubro'])){
	$rubro=$_POST['rubro'];	
}
if(isset($_POST['nombre'])){
	$nombre=$_POST['nombre'];	
}

$mysql=mysql_query("UPDATE usuario_privilegios SET  nombre = '$nombre' WHERE id = '$rubro'" ,$link);
if(!$mysql){
	die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../usuario.php?ruta=if_privilegios_a.php&capturado=1";</script>';
}
?>