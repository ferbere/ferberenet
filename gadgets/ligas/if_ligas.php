<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	$link=Conectarse();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<form method="post" action="gadgets/ligas/ip_ligas.php" enctype="multipart/form-data" name="fvalida">
		   	 <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
			<h1>Agregar ligar</h1>
			<label>Nombre</label>
			<input type="text" name="nombre">
			<label>Ruta</label>
			<input type="text" name="ruta">
			<fieldset>
				<legend>Imagen</legend>
				<input type="file" name="imagen">
			</fieldset>
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