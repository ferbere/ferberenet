<?php
session_start();
if(($_SESSION['privilegioss']=="ferbere")||($_SESSION['privilegioss']=="admin")){
	$link=Conectarse();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<form method="post" action="gadgets/video/ip_video.php">
		<h1>Agregar video</h1>
		<label>Nombre</label>
		<input type="text" name="nombre">
		<label>Fecha</label>
		<input type="text" name="fecha" placeholder="YYYY-MM-DD">
		<label>Descripción</label>
		<textarea name="descripcion"></textarea>
		<label>Liga</label>
		<input type="text" name="liga">
		<fieldset>
			<legend>Visible:</legend>
			<div class="radio">
				<label for="1" class="not">Sí</label>
				<input type="radio" class="not2" name="visible" value="1">
				<label for="0" class="not">No</label>
				<input type="radio" class="not2" name="visible" value="0" checked>
			</div>
		</fieldset>
		<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
	</form>
<?php
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
	echo "Usted no tiene acceso a esta seccción";
}