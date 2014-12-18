<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
$diputado=$_POST["diputado"];
$boton_social=$_POST["boton_social"];
$cuenta=$_POST["cuenta"];
$url=$_POST["url"];

$que=mysql_query("INSERT INTO perfil_asigna_boton (diputado,boton_social,cuenta,url) VALUES ('{$diputado}','{$boton_social}','{$cuenta}','{$url}') ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="../../perfil.php?ruta=if_asigna_boton.php&capturado=1";</script>';
}
?>