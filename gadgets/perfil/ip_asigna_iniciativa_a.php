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
if(isset($_POST['iniciativa'])){
	$iniciativa=$_POST['iniciativa'];	
}
if(isset($_POST['suscribe'])){
	$suscribe=$_POST['suscribe'];	
}

$mysql=mysql_query("UPDATE perfil_asigna_iniciativa SET  diputado = '$diputado',iniciativa = '$iniciativa', suscribe = '$suscribe' WHERE id = '$rubro'" ,$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../perfil.php?ruta=if_asigna_iniciativa_a.php&capturado=1";</script>';
}
?>