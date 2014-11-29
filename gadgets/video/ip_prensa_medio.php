<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
$nombre=$_POST['nombre'];
$mysql=mysql_query("INSERT into prensa_medios (nombre) values ('{$nombre}')",$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="../../prensa.php?ruta=if_prensa.php&capturado=1";</script>';
}
?>