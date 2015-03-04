<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<form method="post" action="gadgets/configura/ip_complex.php" name="fvalida">
			<h1>Crear celda en Complex Template</h1>
			<label>Contenedor</label>
			<input type="text" name="content">
			<fieldset>
				<legend>visible</legend>
				<div class="radio">
					<label for="0" class="not">No</label>
					<input type="radio" name="visible" value="0" class="not2">
					<label for="1" class="not">Sí</label>
					<input type="radio" name="visible" value="1" class="not2">
			</fieldset>
			<label>Orden</label>
			<input type="number" name="orden">
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