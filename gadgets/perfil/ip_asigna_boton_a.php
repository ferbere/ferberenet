<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_POST['rubro'])){
	$rubro=$_POST['rubro'];	
}
if(isset($_POST['diputado'])){
	$diputado=$_POST['diputado'];	
}
if(isset($_POST['boton_social'])){
	$boton_social=$_POST['boton_social'];	
}
if(isset($_POST['cuenta'])){
	$cuenta=$_POST['cuenta'];	
}
if(isset($_POST['url'])){
	$url=$_POST['url'];	
}

$mysql=mysql_query("UPDATE perfil_asigna_boton SET  diputado = '$diputado',boton_social = '$boton_social', cuenta = '$cuenta', url = '$url' WHERE id = '$rubro'" ,$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../perfil.php?ruta=if_asigna_boton_a.php&capturado=1";</script>';
}
?>