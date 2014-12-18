<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
$diputado=$_POST["diputado"];
$iniciativa=$_POST["iniciativa"];
$suscribe=$_POST["suscribe"];

$que=mysql_query("INSERT INTO perfil_asigna_iniciativa (diputado,iniciativa,suscribe) VALUES ('{$diputado}','{$iniciativa}','{$suscribe}') ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="../../perfil.php?ruta=if_asigna_iniciativa.php&capturado=1";</script>';
}
?>