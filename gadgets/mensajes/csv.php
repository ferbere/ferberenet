<?php
require_once("../classes/mysql.php");
$mysql = new MySQL();

ini_set ('auto_detect_line_endings','1');

$fp = fopen ("./asistentes.csv", "r");

while ($data = fgetcsv ($fp, 1000, ";")){
	$sql = $mysql->consultar("INSERT INTO mails_massive_directorio (nombre,email,grupo)
VALUES ('".$data[0]."','".$data[1]."','".$data[2]."')");

}

fclose($fp);

echo "a ver";
?>