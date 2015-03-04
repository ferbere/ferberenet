<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<form method="post" action="gadgets/configura/ip_templates.php" name="fvalida">
		<h1>Crear hoja de estilo</h1>
		<label>Página</label>
		<input type="pagina" name="pagina">
		<label>Hoja de estilo</label>
		<input type="text" name="css">
		<label>Título</label>
		<input type="text" name="title">
		<label>Cabezal</label>
		<input type="text" name="header">
		<label>Botonera</label>
		<input type="text" name="navbar">
		<label>Logotipo</label>
		<input type="text" name="logo">
		<label>Título de contenido</label>
		<input type="text" name="tit_maincontent">
		<label>Contenido principal</label>
		<input type="text" name="maincontent">
		<label>Objeto principal</label>
		<input type="text" name="main_object">
		<label>Detalle</label>
		<input type="text" name="detail" >
		<label>Pie de página</label>
		<input type="text" name="footer" >
		<h2>banners</h2>
		<label>Banner 1</label>
		<input type="text" name="bann1" >
		<label>Banner 2</label>
		<input type="text" name="bann2" >
		<label>Banner 3</label>
		<input type="text" name="bann3" >
		<label>Banner 4</label>
		<input type="text" name="bann4" >
		<label>Banner 0</label>
		<input type="text" name="bann0" >
		<input type="submit" value="enviar">
		</form>
<?php
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
	echo "Usted no tiene acceso a esta seccción";
}
?>