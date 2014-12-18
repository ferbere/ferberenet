<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
if(isset($_POST['rubro'])){
	$rubro=$_POST['rubro'];	
}
if(isset($_POST['diputado'])){
	$diputado=$_POST['diputado'];	
}
if(isset($_POST['comision'])){
	$comision=$_POST['comision'];	
}
if(isset($_POST['preside'])){
	$preside=$_POST['preside'];	
}

$mysql=mysql_query("UPDATE perfil_asigna_comisiones SET  diputado = '$diputado',comision = '$comision', preside = '$preside' WHERE id = '$rubro'" ,$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../perfil.php?ruta=if_asigna_a.php&capturado=1";</script>';
}
?>