<?php
session_start();
error_reporting(0);
include_once("classes/mysql.php");
include_once("classes/quiz_result.class.php");
include_once("classes/buclesub.class.php");

$mysql=new MySQL();
if(isset($_GET['quiz_id'])){
	$_SESSION['quiz_id']=$_GET['quiz_id'];
}
if(!isset($_GET['quiz_id'])){
	
}

if(isset($_POST['sub'])){
	$sub=$_POST['sub'];
}
if(isset($_GET['sub'])){
	$sub=$_GET['sub'];
}

	$sql9=$mysql->consulta("SELECT id FROM quiz_ques WHERE quiz = ".$_SESSION['quiz_id']." ORDER BY id ASC LIMIT 1");
	$row9=$mysql->fetch_array($sql9);
	$subb=$row9[0];
if(empty($sub)){
	$sub=$row9[0];
}
$tot_pre=new bucleSub($_SESSION['quiz_id'],'','');//("#Quiz","iteracion","Total preguntas del quiz")
$sql=$mysql->consulta("SELECT pregunta FROM quiz_ques WHERE id = '$sub' ");
$row=$mysql->fetch_array($sql);
	$tot_pregg=$tot_pre->qQ();
	$tot_preg=$tot_pregg[0];
	
	if($sub==$subb){
		$nomb=1;
	}else{
		$nomb=($sub-$subb)+1;
	}
	echo '<table>';
	echo '<tr>';
	echo '<td>';
	echo '<table width="500px">';
	echo '<tr><td colspan="2"><h1>'.$row[0].'</h1></td></tr>';
	echo '<tr><td colspan="2"><h4>('.$nomb.'  de '.$tot_preg.' preguntas)</h4></td></tr>';
$sql2=$mysql->consulta("SELECT id,respuesta FROM quiz_answ WHERE ques = '$sub' ");
$quiz=new quiz_result($_SESSION['quiz_id'],$sub);
$ir=$quiz->qu_Re();
$cuenta=$ir[1];
$trepida=$ir[2];
$ggg=$nomb-1;
for($i=0;$i<$cuenta;$i++){
	$mas[]= $trepida[$i][$ggg];
}
$graf = array_count_values($mas);
while($row2=$mysql->fetch_array($sql2)){
	if($graf[$row2[0]]==''){
		$rout=0;
	}else{
		$rout=$graf[$row2[0]];
	}
	echo '<tr>';
	echo '<td>'.$row2[1].'</td><td><small><b>('.$rout.' votos)</b></small></td>';	
	echo '</tr>';
}
/*
echo '<pre>';
print_r($mas); 
echo '</pre>';	
*/
?>
	<tr><td></td><td><small><? echo $cuenta ?> votantes</small></td></tr>
	<tr><td colspan="2" height="20px"></td></tr>
	<tr>
		<td></td>
		<td>
	<form action="quiz.php?ruta=resultados.php" method="post">
	<input type="hidden" name="sub" value="<?php echo ($sub+1);?>">
	<?php
	if($nomb==$tot_preg){
		echo 'Se acabó';
	}else{
		echo '<input type="submit" value="siguiente">';
	}
	?>

		</td>
	</tr>
</table>
</td>
<td><div></div>
	</td>
</tr>
</table>