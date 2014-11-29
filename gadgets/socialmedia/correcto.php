<?php
session_start();
header("Location: ".$_SERVER['HTTP_REFERER']);
include_once('../classes/mysql.php');
$mysql=new MySQL();
if(isset($_GET['rubro'])){
	$rubro=$_GET['rubro'];
}
if(isset($_GET['correcto'])){
	$correcto=$_GET['correcto'];
}
	$sql=$mysql->consulta("UPDATE articulos_index SET conflicto = '$correcto' WHERE id = '$rubro'");

?>