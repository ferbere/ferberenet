<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
$titulo=$_POST["titulo"];
$imagen=$_POST["imagen"];
$contenido=$_POST["contenido"];
$visible=$_POST["visible"];
$que=mysql_query("INSERT into testimonios_index (titulo,imagen,contenido,visible) values ('{$titulo}','{$imagen}','{$contenido}','{$visible}') ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../testimonios.php?ruta=if_testimonios.php&capturado=1";</script>';
}
?>