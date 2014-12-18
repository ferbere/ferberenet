<? 
session_start();
include_once('classes/mysql.php');
$mysql = new MySQL();
$sql=$mysql->consulta("SELECT * FROM quiz_index WHERE id > 0");
	echo '<div>';
while($row=$mysql->fetch_array($sql)){
	echo '<div>';
	echo 	'<a href="quiz.php?ruta=resultados.php&quiz_id='.$row[0].'">';
	echo 		$row[1];
	echo 	'</a>';
	echo '</div>';
}
	echo '</div>';
?>