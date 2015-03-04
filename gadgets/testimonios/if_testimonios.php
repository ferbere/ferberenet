<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<form method="post" action="gadgets/testimonios/ip_testimonios.php" enctype="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
			<h1>Agregar testimonio</h1>
			<label>Título</label>
			<input type="text" name="titulo">
			<label>Subtítulo</label>
			<input type="text" name="subtitulo">
			<fieldset>
				<legend>Imagen</legend>
				<input type="file" name="imagen" >
			</fieldset>
			<label>Contenido</label>
			<textarea name="contenido"></textarea><br>
			<fieldset>
				<div id="radio">
				<legend>Publicado</legend>
					<label for="1" class="not">Sí</label>
					<input type="radio" name="visible" value="1" class="not2">
					<label for="0" class="not">No</label> 
					<input type="radio" name="visible" value="0" class="not2" checked>
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