<?php
session_start();
include_once('../../../classes/mysql.php');
$mysql = new MySQL();
if(isset($_POST['rubro'])){
	$rubro=$_POST["rubro"];
}
if(isset($_POST['catalogo'])){
	$catalogo=$_POST["catalogo"];
}
if(isset($_POST['desde'])){
	$desde=$_POST["desde"];
}
if(isset($_POST['hasta'])){
	$hasta=$_POST["hasta"];
}
if(isset($_POST['precio'])){
	$precio=$_POST["precio"];
}
if(isset($_POST['suma'])){
	$suma=$_POST["suma"];
}
/*
echo $rubro.'<br>';
echo $catalogo.'<br>';
echo $desde.'<br>';
echo $hasta.'<br>';
echo $precio.'<br>';
*/
$sql=$mysql->consulta("UPDATE comprar_index SET catalogo='$catalogo' ,desde='$desde',hasta='$hasta',precio='$precio',suma='$suma' WHERE id ='$rubro'");
	if(!$sql){
		echo '<script>window.location.href="../../comprar.php?ruta=if_registro_a.php&capturado=2";</script>';
	}else{
		echo '<script>window.location.href="../../comprar.php?ruta=if_registro_a.php&capturado=1";</script>';
}
?>