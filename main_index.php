<?php
session_start();
include_once('classes/template.class.php');
if(isset($rubro)){
	$rubro=$_GET['rubro'];
}
$tp=new templateParser('template/template.tpl');
include_once("classes/conex.php");
$link=Conectarse();
$sql = mysql_query("SELECT id,css,title,header,navbar,logo,tit_maincontent,maincontent,main_object,detail,footer,pagina,bann1,bann2,bann3,bann4,bann0 FROM template_index WHERE id = 3 ",$link);
	while($row=mysql_fetch_array($sql)){
		$tp->parseTemplate($row);
		echo $tp->display();
	}
?>
