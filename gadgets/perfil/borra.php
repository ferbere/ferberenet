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
	mysql_query("DELETE FROM perfil_index WHERE id = '$rubro' ", $link);
}elseif($borra==2){
	mysql_query("DELETE FROM perfil_categoria WHERE id = '$rubro' ", $link);
}elseif($borra==3){
	mysql_query("DELETE FROM perfil_comisiones WHERE id = '$rubro' ", $link);
}elseif($borra==4){
	mysql_query("DELETE FROM perfil_asigna_comisiones WHERE id = '$rubro' ", $link);
}elseif($borra==5){
	mysql_query("DELETE FROM perfil_boton_social WHERE id = '$rubro' ", $link);
}elseif($borra==6){
	mysql_query("DELETE FROM perfil_asigna_boton WHERE id = '$rubro' ", $link);
}elseif($borra==7){
	mysql_query("DELETE FROM perfil_iniciativa WHERE id = '$rubro' ", $link);
}elseif($borra==8){
	mysql_query("DELETE FROM perfil_asigna_iniciativa WHERE id = '$rubro' ", $link);
}
?>