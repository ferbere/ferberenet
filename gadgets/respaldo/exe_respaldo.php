<?php
session_start();
include_once("classes/path.class.php");
$pth=new path();
$url = $pth->the_path();

$path=$url[0].'/'.$url[1].$_SESSION['admin'].'/respaldos/';
//$path='../'.$url[1].$_SESSION['admin'].'/respaldos/';

date_default_timezone_set('America/Chicago'); 
if($_GET['command']){
	$command=$_GET['command'];
}
if(empty($url[1])){
	$filename=$path.date("Y-m-d_H-i");
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = $_SESSION['admin'];
}else{
	$filename=$path.date("Y-m-d_H-i");
	$dbhost = 'mysql912.ixwebhosting.com';
	$dbuser = 'ferbere_ramses';
	$dbpass = 'dartagnan';
	$dbname = 'ferbere_'.$_SESSION['admin'];
}
$backupFile = $filename.'_'.$dbname.'.sql';
if(isset($_GET['capturado'])){
	$capturado=$_GET['capturado'];
}
if(empty($capturado)){
	echo '¿Listo? <a href="respaldo.php?ruta=exe_respaldo.php&capturado=1">respalda</a>';
}elseif($capturado==1){
	$command = "mysqldump --opt --host=".$dbhost." --user=".$dbuser." --password=".$dbpass." ".$dbname." > ".$backupFile;
	system($command);
	header("Location:respaldo.php?ruta=exe_respaldo.php&capturado=2");
	exit();
}else{
	echo "<strong>//ATENCIÓN//</strong><br>La base de datos: <b>".$dbname."</b> ha sido respaldada y está en la carpeta <b>respaldos</b>, dentro de este gadget";
}
?>
