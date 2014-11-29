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
if(isset($_POST['belong'])){
	$belong=$_POST['belong'];	
}

$mysql=mysql_query("UPDATE articulos_categoria SET  nombre = '$nombre',imagen = '$imagen',belong = '$belong' WHERE id = '$rubro'" ,$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="../../articulos.php?ruta=if_categoria_a.php&capturado=1";</script>';
}
include("style/footer_admin.html");
?>