<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<form method="post" action="gadgets/menus/ip_submenu.php">
		<h1>Agregar Submenú</h1>
		<label>Nombre:</label>
		<input type="text" name="nombre">
		<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
		</form>
	<?php
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
	echo "Usted no tiene acceso a esta seccción";
}
?>