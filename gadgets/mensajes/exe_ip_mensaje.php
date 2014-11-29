<?php
include_once('../../../classes/conex.php');
include_once('../../classes/sacar.class.php');
$link=Conectarse();
if(isset($_GET['dirigido'])){
	$dirigido=$_GET['dirigido'];
}
if(isset($_GET['nombre'])){
	$nombre=$_GET['nombre'];
}
if(isset($_GET['titulo'])){
	$titulo=$_GET['titulo'];
}
if(isset($_GET['mensaje'])){
	$mensaje=$_GET['mensaje'];
}
if(isset($_GET['email'])){
	$email=$_GET['email'];
}
if(isset($_GET['ip'])){
	$ip=$_GET['ip'];
}
if(empty($ip)){
	$ip=$_SERVER['REMOTE_ADDR'];
	}
$sql=mysql_query("INSERT INTO mails_index (nombre,titulo,mensaje,email,dirigido,ip) VALUES ('{$nombre}','{$titulo}','{$mensaje}', '{$email}', '{$dirigido}', '{$ip}')",$link);
if(!$sql){
die ("chispas:" .mysql_error());
}else{
	$pagina= sacar($_SERVER['PHP_SELF'],"/","admin");
	$liga= "/".$pagina."contacto.php?mensaje=enviado";
	echo '<script>window.location.href="'.$liga.'";</script>';
}

?>