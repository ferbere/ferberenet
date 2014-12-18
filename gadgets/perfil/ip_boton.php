<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
$nombre=$_POST['nombre'];
$mysql=mysql_query("INSERT INTO perfil_boton_social (nombre) VALUES ('{$nombre}')",$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="../../perfil.php?ruta=if_boton.php&capturado=1";</script>';
}
?>