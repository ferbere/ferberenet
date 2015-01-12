<?php
session_start();
include_once('classes/template.class.php');
if(isset($rubro)){
	$rubro=$_GET['rubro'];
}
$tp=new templateParser('template/template.tpl');
include_once("classes/conex.php");
$link=Conectarse();
$sql = mysql_query("SELECT * FROM template_index WHERE id = 3 ",$link);
	while($row=mysql_fetch_array($sql)){
		$tp->parseTemplate($row);
		echo $tp->display();
	}
?>
