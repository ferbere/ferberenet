<?php
include_once('../classes/mysql.php');
$mysql = new MysQL();

$sql = $mysql->consulta("SELECT id, titulo FROM articulos_index");
while ($row=$mysql->fetch_array($sql)){
	echo $row[0].' '.$row[1].'<br>';
}


?>