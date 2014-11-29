<?php
session_start();
function Conectarse(){
if(!isset($pagina)){
	$pagina=$_GET['pagina'];
}
if(!isset($_SESSION['admin'])){
	$_SESSION['admin']=$pagina;
}
	if (!($link=mysql_connect("localhost","root", "")))
	{
		echo "Error conectando a la base de datos.";
		exit();
	}
	if (!mysql_select_db($_SESSION['admin'],$link))
	{
		echo "Error seleccionando la base de datos.";
		exit();
	}
	return $link;
}
?>
