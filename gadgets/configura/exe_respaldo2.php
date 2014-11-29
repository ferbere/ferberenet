<?php
//	$filename='~/admin/gadgets/configura/respaldos/';
	$filename='~/ferbere/patriciagarcia.com.mx/patricia/admin/gadgets/configura/respaldos/';
	$dbhost = 'mysql912.ixwebhosting.com';
	$dbuser = 'ferbere_ramses';
	$dbpass = 'dartagnan';
	$dbname = 'ferbere_patricia';
	$backupFile = $filename . $dbname ."-". date("Y-m-d") . '.sql';
if(isset($_GET['capturado'])){
	$capturado=$_GET['capturado'];
}
if(empty($capturado)){
	echo '¿Listo? <a href="configura.php?ruta=exe_respaldo.php&capturado=1">respalda</a>';
}elseif($capturado==1){
//	$command = "/Applications/mamp/Library/bin/mysqldump --opt --host=".$dbhost." --user=".$dbuser." --password=".$dbpass."  ".$dbname." > ".$backupFile;
//	$command = "/usr/bin/mysqldump -h".$dbhost." -u".$dbuser." -p".$dbpass."  ".$dbname." > ".$backupFile;
	$command = "/usr/bin/mysqldump --opt --host=".$dbhost." --user=".$dbuser." --password=".$dbpass."  ".$dbname." > ".$backupFile;
	system($command);
	header("Location:configura.php?ruta=exe_respaldo.php&capturado=2");
}else{
	echo "<strong>//ATENCIÓN//</strong><br>La base de datos: <b>".$dbname."</b> ha sido respaldada y está en la carpeta <b>respaldos</b>, dentro de este gadget";
}

?>
