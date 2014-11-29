<?php
include_once('../../classes/conex.php');
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
if(isset($_POST['ruta'])){
	$ruta=$_POST['ruta'];	
}
if(isset($_POST['submenu'])){
	$submenu=$_POST['submenu'];	
}

if(isset($_POST['posicion'])){
	$posicion=$_POST['posicion'];	
}
if(isset($_POST['privilegios'])){
	$privilegios=$_POST['privilegios'];	
}
if(isset($_POST['visible'])){
	$visible=$_POST['visible'];	
}
$mysql=mysql_query("UPDATE menus_botones SET  nombre = '$nombre',imagen = '$imagen',ruta = '$ruta',submenu = '$submenu', posicion = '$posicion',privilegios = '$privilegios',visible = '$visible' WHERE id = '$rubro'" ,$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="../../menus.php?ruta=if_botones_a.php&capturado=1&rubro='.$rubro.'";</script>';
}
?>