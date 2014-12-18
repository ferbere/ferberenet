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
if(isset($_POST['texto'])){
	$texto=$_POST['texto'];	
}
if(isset($_POST['categoria'])){
	$categoria=$_POST['categoria'];	
}
if(isset($_POST['visible'])){
	$visible=$_POST['visible'];	
}
$mysql=mysql_query("UPDATE perfil_iniciativa SET  nombre = '$nombre', texto = '$texto', categoria = '$categoria',visible = '$visible' WHERE id = '$rubro'" ,$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../perfil.php?ruta=if_iniciativa_a.php&capturado=1";</script>';
}
?>