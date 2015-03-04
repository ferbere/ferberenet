<?php
session_start();
if(($_SESSION["estado"]=="Autenticado") AND ($_SESSION["privilegioss"]=="ferbere")){
	header("Location: ".$_SERVER['HTTP_REFERER']);
	include_once('../../classes/conex.php');
	$link=Conectarse();
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
	if(isset($_GET['borra'])){
		$borra=$_GET['borra'];
	}
	if($borra==1){
		mysql_query("DELETE FROM usuario_index WHERE id = '$rubro' ", $link);
	}elseif($borra==2){
		mysql_query("DELETE FROM usuario_privilegios WHERE id = '$rubro' ", $link);
	}elseif($borra==3){
		mysql_query("DELETE FROM usuario_categoria WHERE id = '$rubro' ", $link);
	}
}else{
echo "Usted no tiene acceso a esta seccción";
}

	?>