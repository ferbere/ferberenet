<?php
include_once("../classes/mysql.php");
$mysql=new MySQL();

for($i=1;$i<130;$i++){
	$sql=$mysql->consulta("SELECT id,boton,imagen FROM bunker.gadgets_botones_admin WHERE id = '$i'");
	$row=$mysql->fetch_array($sql);
	$sql2=$mysql->consulta("UPDATE gadgets_botones_admin SET imagen = ".$row[2]." WHERE id = ".$i);
}




?>