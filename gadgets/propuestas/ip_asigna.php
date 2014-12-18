<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
$diputado=$_POST["diputado"];
$comision=$_POST["comision"];
$preside=$_POST["preside"];

$que=mysql_query("INSERT INTO perfil_asigna_comisiones (diputado,comision,preside) VALUES ('{$diputado}','{$comision}','{$preside}') ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="../../perfil.php?ruta=if_asigna.php&capturado=1";</script>';
}
?>