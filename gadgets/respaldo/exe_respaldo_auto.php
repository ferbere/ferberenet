<?php
date_default_timezone_set('America/Chicago'); 
if($_GET['command']){
	$command=$_GET['command'];
}
	$filename='/Applications/xampp/htdocs/congreso/admin/gadgets/respaldo/respaldos/';
//	$dbhost = 'mysql912.ixwebhosting.com';
	$dbhost = 'localhost';
//	$dbuser = 'ferbere_ramses';
	$dbuser = 'root';
//	$dbpass = 'dartagnan';
	$dbpass = '';
//	$dbname = 'ferbere_congreso';
	$dbname = 'congreso';
	$backupFile = $filename . $dbname ."-". date("Y-m-d")."--".date("H:i:s") . '.sql';
if(isset($_GET['capturado'])){
	$capturado=$_GET['capturado'];
}
if(empty($capturado)){
	$command = "mysqldump --opt --host=".$dbhost." --user=".$dbuser." ".$dbname." > ".$backupFile;
	system($command);
	exit();
}else{
	echo "¡Algo ha salido mal!";
}
?>
