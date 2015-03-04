<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	$link=Conectarse();
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<form method="post" action="gadgets/articulos/ip_tag.php">
			<h1>Agregar categoría</h1>
			<label>Nombre:</label>
			<input type="text" name="nombre" size="30">
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