<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
if(isset($_POST["rubro"])){
	$rubro=$_POST["rubro"];
}
if(isset($_POST["coordinador_id"])){
	$coordinador_id=$_POST["coordinador_id"];
}
if(isset($_POST["dia_id"])){
	$dia_id=$_POST["dia_id"];
}

$que=mysql_query("INSERT INTO congreso_coordina (coordinador_id,dia_id) VALUES ('{$coordinador_id}',{$dia_id}) ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../congreso.php?ruta=if_coordina.php&rubro='.$rubro.'";</script>';
}
?>