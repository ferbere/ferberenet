<?php
session_start();
include_once('classes/mysql.php');
$mysql=new MySQL();

if(isset($_GET['gt'])){
	$gt=$_GET['gt'];	
}
date_default_timezone_set('US/Eastern');
$cierra=date("Y-m-d H:i:s");

$sql=$mysql->consulta("UPDATE caja_index SET sesion = 0,cantidad = '$gt',cierra='$cierra' WHERE sesion = 1 AND cajero = ".$_SESSION['id']);
if(!$sql){
	die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="caja.php?ruta=caja.php";</script>';
}

?>