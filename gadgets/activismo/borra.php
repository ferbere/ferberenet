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
		mysql_query("DELETE FROM activismo_index WHERE id = '$rubro' ", $link);
	}elseif($borra==2){
		mysql_query("DELETE FROM activismo_rango WHERE id = '$rubro' ", $link);
	}elseif($borra==3){
		mysql_query("DELETE FROM activismo_redes WHERE id = '$rubro' ", $link);
	}
}else{
echo "Usted no tiene acceso a esta seccci�n";
}

	?>