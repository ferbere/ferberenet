<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
if(isset($_POST['rubro'])){
	$rubro=$_POST['rubro'];	
}

if(isset($_POST['liga'])){
	$liga=$_POST['liga'];
}
if(isset($_POST['nombre'])){
	$nombre=$_POST['nombre'];	
}
if(isset($_POST['descripcion'])){
	$descripcion=$_POST['descripcion'];
}
/*if(isset($_POST['medio'])){
	$medio=$_POST['medio'];
}*/
if(isset($_POST['fecha'])){
	$fecha=$_POST['fecha'];
}
if(isset($_POST['visible'])){
	$visible=$_POST['visible'];
}
$mysql=mysql_query("UPDATE video_index SET  liga = '$liga', nombre = '$nombre', descripcion = '$descripcion', fecha = '$fecha', visible='$visible' WHERE id = '$rubro'" ,$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../video.php?ruta=if_video_a.php&capturado=1";</script>';
}
include("style/footer_admin.html");
?>