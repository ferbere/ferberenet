<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
$numero=$_POST["numero"];
$desde=$_POST["desde"];
$hasta=$_POST["hasta"];
$visible=$_POST["visible"];
$que=mysql_query("INSERT INTO prospecta_edicion (numero,desde,hasta,visible) VALUES ('{$numero}','{$desde}','{$hasta}','{$visible}') ",$link);
if(!$que){
	die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../prospecta.php?ruta=if_edicion.php&capturado=1";</script>';
}
?>