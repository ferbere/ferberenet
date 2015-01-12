<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();

$autor=$_POST["autor"];
$contenido=$_POST["contenido"];
$visible=$_POST["visible"];
$diputado=$_POST["diputado"];
$que=mysql_query("INSERT INTO citas_index (autor,contenido,visible,diputado) values ('{$autor}','{$contenido}','{$visible}','{$diputado}') ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../citas.php?ruta=if_citas.php&capturado=1";</script>';
	}
	?>