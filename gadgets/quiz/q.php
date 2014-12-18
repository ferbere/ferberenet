<?php
if(isset($_GET['rubro'])){
	$rubro=$_GET['rubro'];
}
if(empty($rubro)){
	$rubro=1;
}
if(isset($_GET['respuesto'])){
	$respuesto=$_GET['respuesto'];
}
if(empty($respuesto)){
	$cal='<a href="'.$_SERVER['PHP_SELF'].'?rubro='.$rubro.'&respuesto=si&'.$rubro.'&vinc=';
	include_once("classes/conex.php");
	$link = Conectarse();
	$sql=mysql_query("SELECT pregunta FROM quiz_ques WHERE id = '$rubro' ");
	while($row=mysql_fetch_array($sql)){
		$pregunta=$row['pregunta'];
	}
	$sql_answ=mysql_query("SELECT respuesta,valida FROM quiz_answ WHERE vincula = '$rubro' ");
	$cuenta=mysql_num_rows($sql_answ);
	echo $rubro.'.- '.$pregunta.'<br>';
	for($i=1;$i<=$cuenta;$i++){
		$row_answ=mysql_fetch_array($sql_answ);
		$vinc=$row_answ['valida'];
			echo $cal.$vinc.'">'.$i.') '.$row_answ['respuesta'],'</a><br>';
		}
}else{
	if(isset($_GET['vinc'])){
		$vinc=$_GET['vinc'];
	}
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
	$suma=$rubro+1;
	if($vinc==0){
		echo "Nnnnnnnnnneeeeel, baaaa-boooo-sooo<br><br>";
		echo '<a href="quiz.php?rubro='.$rubro.'">Intentar de nuevo</a>'.$rubro;
	}else{
		echo "¡Vaya, una!<br><br>";
		echo '<a href="quiz.php?rubro='.$suma.'">Siguiente</a>'.$rubro;
	}
}
?>