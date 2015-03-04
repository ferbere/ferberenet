<?php
session_start();
if(($_SESSION["privilegioss"]=="admin")||($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="directivo")){
$link=Conectarse();
include("library/tinymce.php");
include("library/confirm.php");
if(isset($_GET['capturado'])){
$capturado=$_GET['capturado'];
}
if(empty($capturado)){
?>

	<form method="post" action="gadgets/corporativa/ip_corporativa.php" name="fvalida" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
		<h1>Agregar información Corporativa</h1>
		<label>Título</label>
		<input type="text" name="titulo">
		<label>Subtítulo</label>
		<input type="text" name="subtitulo">
		<fieldset>
			<legend>Imagen:</legend>
			<input type="file" name="imagen" >
		</fieldset>
		<label>Contenido</label>
		<textarea name="contenido"></textarea>
		<fieldset>
			<legend>Publicado:</legend>
			<div class="radio">
				<label for="1" class="not">Sí</label>
				<input type="radio" class="not2" name="publicado" value="1">
				<label for="0" class="not">No</label>
				<input type="radio" class="not2" name="publicado" value="0" checked>
			</div>
		</fieldset>
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