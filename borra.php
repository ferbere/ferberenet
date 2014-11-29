<?php
session_start();
header("Location: ".$_SERVER['HTTP_REFERER']);
include("style/header_admin.html");
require_once("conex.php");
$link=Conectarse();
if(isset($_GET['rubro'])){
$rubro=$_GET['rubro'];
}
if(isset($_GET['borra'])){
$borra=$_GET['borra'];
}
if($borra==1){
mysql_query("DELETE FROM contenido WHERE id = '$rubro' ", $link);
}elseif($borra==2){
mysql_query("DELETE FROM user WHERE id = '$rubro' ", $link);
}elseif($borra==3){
mysql_query("DELETE FROM secciones WHERE id = '$rubro' ", $link);
}elseif($borra==4){
mysql_query("DELETE FROM ediciones WHERE id = '$rubro' ", $link);
}elseif($borra==5){
mysql_query("DELETE FROM corporativa WHERE id = '$rubro' ", $link);
}elseif($borra==7){
mysql_query("DELETE FROM mails WHERE id = '$rubro' ", $link);
}elseif($borra==8){
mysql_query("DELETE FROM fotos WHERE id = '$rubro' ", $link);
}elseif($borra==9){
mysql_query("DELETE FROM fotoedicion WHERE id = '$rubro' ", $link);
}elseif($borra==14){
mysql_query("DELETE FROM catalogo WHERE id = '$rubro' ", $link);
}elseif($borra==15){
mysql_query("DELETE FROM cat_catalogo WHERE id = '$rubro' ", $link);
}elseif($borra==16){
mysql_query("DELETE FROM botones WHERE id = '$rubro' ", $link);
}elseif($borra==17){
mysql_query("DELETE FROM submenu WHERE id = '$rubro' ", $link);
}elseif($borra==18){
mysql_query("DELETE FROM bann WHERE id = '$rubro' ", $link);
}elseif($borra==19){
mysql_query("DELETE FROM proyectos WHERE id = '$rubro' ", $link);
}


include("style/footer_admin.html"); ?>