<?php
include_once("../classes/mysql.php");
$mysql=new MySQL();
$sql=$mysql->consulta("SELECT css FROM template_index WHERE id = 3");
$row=$mysql->fetch_array($sql);
if(!empty($row[0])){
	$sql_u=$mysql->consulta("SELECT url,pagina FROM template_general");
	$url=$mysql->fetch_array($sql_u);
	if(empty($url[1])){
		$url_c='http://localhost/';
	}else{
		$url_c='http://'.$url[1].'/';
	}
	$path=$url_c.$_SESSION['admin'].'/style/style_admin.css';
}else{
	$path="vacío";
}
echo $path;
?>