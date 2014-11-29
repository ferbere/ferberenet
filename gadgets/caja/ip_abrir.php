<?php
session_start();
include_once('../../classes/mysql.php');
$mysql=new MySQL();

$fondo=$_POST['fondo'];

$sql=$mysql->consulta("INSERT INTO caja_index (sesion,fondo,cajero) values ('1','{$fondo}','{$_SESSION['id']}')",$link);
if(!$sql){
	die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../caja.php?ruta=caja.php";</script>';
}
?>