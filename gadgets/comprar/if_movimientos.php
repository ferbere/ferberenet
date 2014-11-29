<?php
include_once("../classes/mysql.php");
$mysql = new MySQL();
$sql = $mysql->consulta("SELECT id,nombre FROM catalogo_index");
while($row=$mysql->fetch_array($sql)){
	echo $row['nombre'].'<br>';
}

?>