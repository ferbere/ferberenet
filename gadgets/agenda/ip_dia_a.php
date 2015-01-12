<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_POST["rubro"])){
	$rubro=$_POST["rubro"];
}
if(isset($_POST["fecha"])){
	$fecha=$_POST["fecha"];
}

$que=mysql_query("UPDATE agenda_dia SET fecha='$fecha' WHERE id = '$rubro' ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../agenda.php?ruta=if_dia_a.php&capturado=1";</script>';
}
?>
