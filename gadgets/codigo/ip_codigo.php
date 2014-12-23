<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
$nombre=$_POST["nombre"];
$categoria=$_POST["categoria"];
$contenido=$_POST["contenido"];
$que=mysql_query("INSERT INTO codigo_index (nombre,categoria,contenido) values ('{$nombre}','{$categoria}','{$contenido}') ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../codigo.php?ruta=if_codigo.php&capturado=1";</script>';
}
include("style/footer_admin.html");
?>
