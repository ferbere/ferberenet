<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_POST["fecha"])){
	$fecha=$_POST["fecha"];
}

$que=mysql_query("INSERT INTO agenda_dia (fecha) VALUES ('{$fecha}')",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../agenda.php?ruta=if_dia.php&capturado=1";</script>';
}
?>
