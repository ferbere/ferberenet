<?php
session_start();
if(isset($_GET['ruta'])){
	$ruta=$_GET['ruta'];
}
include_once("classes/privilegios.class.php");
$pr=new privilegios($_SESSION['user'],$ruta);
$orr=$pr->pRiv();
if($_SESSION["privilegioss"]>=$orr){
	$link=Conectarse();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<form method="post" action="gadgets/usuario/ip_autor.php">
		<h1>Dar de alta usuario</h1>
		<label>Usuario:</label>
		<input type="text" name="user">
		<label>Contraseña:</label>
		<input type="password" name="passwd">
		<label>Nombre completo:</label>
		<input type="text" name="nombre">
		<label>domicilio:</label>
		<input type="text" name="domicilio">
		<label>Población:</label>
		<input type="text" name="poblacion">
		<label>e-mail:</label>
		<input type="email" name="maill">
		<label>Teléfono:</label>
		<input type="text" name="telefono">
		<label>Teléfono celular:</label>
		<input type="text" name="celular">
		<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
<?php
		}else{
			echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
		}
}else{
echo "Usted no tiene acceso a esta seccción";
}
?>