<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_POST["rubro"])){
	$rubro=$_POST["rubro"];
}
if(isset($_POST["content"])){
	$content=$_POST["content"];
}
if(isset($_POST["orden"])){
	$orden=$_POST["orden"];
}
if(isset($_POST["visible"])){
	$visible=$_POST["visible"];
}
$que=mysql_query("UPDATE template_complex SET content = '$content',orden= '$orden',visible= '$visible' WHERE id = '$rubro' ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../configura.php?ruta=if_complex_a.php&capturado=1";</script>';
}
?>