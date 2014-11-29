<?php
session_start();
if(($_SESSION['privilegioss']=='ferbere')||($_SESSION['privilegioss']=='admin')){
	include_once('../../../classes/conex.php');
	//$link=Conectarse();
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
	if(isset($_GET['borra'])){
		$borra=$_GET['borra'];
	}

	if($borra==1){
		mysql_query("DELETE FROM comprar_index WHERE id = '$rubro' ", $link);
		header("Location: ".$_SERVER['PHP_SELF'].'?ruta=registro.php');	
	}elseif($borra==2){
		mysql_query("DELETE FROM comprar_directorio WHERE id = '$rubro' ", $link);
		header("Location: ".$_SERVER['HTTP_REFERER']);
	
	}
}else{
	echo "No tienes privilegios para ingresar en esta sección";
}
?>