<?php
session_start();

include_once("../classes/mysql.php");
$mysql=new MySQL();
include_once("classes/quiz_result_beta.class.php");
$bucle1=new bucleSub('','','','');//("#Quiz","iteracion","Total preguntas del quiz")
$bb1=$bucle1->qQ();
if(isset($_GET['quiz_id'])){
	$quiz_id=$_GET['quiz_id'];
}
$bucle2=new bucleSub($quiz_id,"",$bb1[0],$bb1[2]+1);
	$bb2=$bucle2->bS();
	echo $bb2[1].'<br><br>';
	echo $bb2[3];

/*	$bb3=$bucle2->qu_Re();
	$answ_nu=$bb3[0];//número de preguntas por quiz
	for($a=0;$a<$bb3[1];$a++){
		echo ($a+1).' {';
		for($b=0;$b<$answ_nu;$b++){
			echo $bb3[2][$a][$b].', ';
		}
		echo '}<br>';
	}
*/
?>