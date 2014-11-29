<?php
session_start();
header("Location: ".$_SERVER['HTTP_REFERER']);
include_once('../../../classes/conex.php');
//$link=Conectarse();
if(isset($_GET['rubro'])){
	$rubro=$_GET['rubro'];
}
if(isset($_GET['borra'])){
	$borra=$_GET['borra'];
}
if($borra==1){
	mysql_query("DELETE FROM articulos_index WHERE id = '$rubro' ", $link);
}elseif($borra==2){
	mysql_query("DELETE FROM articulos_categoria WHERE id = '$rubro' ", $link);
}elseif($borra==3){
	mysql_query("DELETE FROM articulos_resaque WHERE id = '$rubro' ", $link);
}elseif($borra==4){
	mysql_query("DELETE FROM articulos_ediciones WHERE id = '$rubro' ", $link);
}elseif($borra==5){
	mysql_query("DELETE FROM articulos_fotoedicion WHERE id = '$rubro' ", $link);
}
?>