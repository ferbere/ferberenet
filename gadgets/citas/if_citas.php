<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")||($_SESSION["privilegioss"]=="directivo")){
$link=Conectarse();
include("library/tinymce.php");
include("library/confirm.php");
if(isset($_GET['capturado'])){
$capturado=$_GET['capturado'];
}
if(empty($capturado)){
?>
	<form method="post" action="gadgets/citas/ip_citas.php">
		<h1>Cita nueva</h1>
		<label>Autor</label>
		<input type="text" name="autor">
		<label>Contenido</label>
		<textarea name="contenido"></textarea>
		<fieldset>
			<div class="radio">
				<legend>Visible</legend>
				<label for ="0" class="not">No</label>
				<input type="radio" class="not2" name="visible" value="0">
				<label for ="1" class="not">Sí</label>
				<input type="radio" class="not2" name="visible" value="1" checked>
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
?>