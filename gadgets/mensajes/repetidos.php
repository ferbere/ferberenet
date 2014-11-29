<?php
include_once("../classes/mysql.php");
$mysql = new MySQL();
if(isset($_GET['rubro'])){
	$rubro=$_GET['rubro'];
}
//$sql = $mysql->consulta("SELECT email FROM mails_massive_directorio");
$sql = $mysql->consulta("SELECT email FROM mails_massive_directorio GROUP BY email HAVING COUNT(*) > 1");
$cuenta = $mysql->num_rows($sql);
	$i = 0;
while($row = $mysql->fetch_array($sql)){
	if($cuenta>0){
		$i = $i+1;
	}
	echo $i.$row['nombre']."\n".$row['email']."<br>";
}
?>
