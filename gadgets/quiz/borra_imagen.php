<?php
include_once('../../../classes/conex.php');
$link=Conectarse();
if(isset($_GET['borra'])){
	$borra=$_GET['borra'];
}
if(isset($_GET['rubro'])){
	$rubro=$_GET['rubro'];
}
if($borra==1){
	$sql=mysql_query("UPDATE quiz_index SET imagen = '' WHERE id = '$rubro' ", $link);
	if(!$sql){
		die ("Pos no se borró el contenido, parece que: " .mysql_error());
	}
	echo 	'<script>window.location.href="../../quiz.php?ruta=if_quiz_a.php&rubro='.$rubro.'";</script>';
}elseif($borra==2){
	$sql=mysql_query("UPDATE quiz_ques SET imagen = '' WHERE id = '$rubro' ", $link);
	if(!$sql){
		die ("Pos no se borró el contenido, parece que: " .mysql_error());
	}
	echo 	'<script>window.location.href="../../quiz.php?ruta=if_ques_a.php&rubro='.$rubro.'";</script>';
}elseif($borra==3){
	$sql=mysql_query("UPDATE quiz_answ SET imagen = '' WHERE id = '$rubro' ", $link);
	if(!$sql){
		die ("Pos no se borró el contenido, parece que: " .mysql_error());
	}
	echo 	'<script>window.location.href="../../quiz.php?ruta=if_answ_a.php&rubro='.$rubro.'";</script>';
}
?>