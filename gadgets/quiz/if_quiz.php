<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<form method="post" action="gadgets/quiz/ip_quiz.php" enctype="multipart/form-data" name="fvalida">
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
			<h1>Agregar Cuestionario</h1>
			<label>Nombre</label>
			<input type="text" name="nombre">
			<label>Imagen</label>
			<input type="file" name="imagen" >
			<label>Contenido:</label>
			<textarea name="contenido"></textarea>
			<fieldset>
				<div id="radio">
				<legend>Publicado</legend>
				<label for="1" class="not">Sí</label>
				<input type="radio" class="not2" name="visible" value="1">
				<label for="0" class="not">No</label>
				<input type="radio" class="not2" name="visible" value="0" checked>
			</fieldset>
			<input type="submit" value="enviar">
		</form>
<?php
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
	echo "Usted no tiene acceso a esta sección";
}
?>