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
if(isset($_POST['imagen'])){
	$imagen=$_POST['imagen'];
}
$mysql=mysql_query("UPDATE activismo_redes SET  nombre = '$nombre',imagen = '$imagen' WHERE id = '$rubro'" ,$link);
if(!$mysql){
	die ("Pos no se captur� el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../activismo.php?ruta=if_red_a.php&capturado=1";</script>';
}
?>