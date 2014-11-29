<?php
include_once("classes/sacar.class.php");
if(isset($_GET['ruta'])){
	$ruta=$_GET['ruta'];
}
$gadget=sacar($_SERVER['PHP_SELF'],'ferberenet/','.php');
include_once("classes/conex.php");
$link = Conectarse();  
$sql=mysql_query("SELECT ruta FROM gadgets_botones_admin WHERE ruta = '$ruta' ",$link) or die (mysql_error());
		$row=mysql_fetch_array($sql);
		include("gadgets/".$gadget."/".$row['ruta']);
?>
