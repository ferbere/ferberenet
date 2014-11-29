<?php
session_start();
header("Location: ".$_SERVER['HTTP_REFERER']);
include_once('../../classes/conex.php');
//$link=Conectarse();
if(isset($_GET['rubro'])){
	$rubro=$_GET['rubro'];
}
if(isset($_GET['borra'])){
	$borra=$_GET['borra'];
}
if($borra==1){
	mysql_query("DELETE FROM prospecta_edicion WHERE id = '$rubro' ", $link);
}elseif($borra==2){
	mysql_query("DELETE FROM prospecta_temporadas WHERE id = '$rubro' ", $link);
}elseif($borra==3){
	mysql_query("DELETE FROM prospecta_cargo WHERE id = '$rubro' ", $link);
}elseif($borra==4){
	mysql_query("DELETE FROM prospecta_perspectiva WHERE id = '$rubro' ", $link);
}elseif($borra==5){
	mysql_query("DELETE FROM prospecta_anuncio WHERE id = '$rubro' ", $link);
}
?>