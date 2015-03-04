<?php
session_start();
if(($_SESSION['privilegioss']=="ferbere")||($_SESSION['privilegioss']=="admin")){
	include_once('classes/conex.php');
	$link=Conectarse();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
			$sql=mysql_query("SELECT id,nombre FROM fotos_categoria",$link);
?>
		<form method="post" action="gadgets/fotos/ip_fotos.php" enctype="multipart/form-data" name="fvalida">
		   	 <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
			<h1>Agregar Foto</h1>
			<label>Nombre:</label>
			<input type="text" name="nombre">
			<label>Subnombre</label>
			<input type="text" name="subnombre">
			<label>Fecha:</label>
			<input type="date" name="fecha" placeholder="YYYY-MM-DD">
			<fieldset>
				<div class="radio">
					<legend>Visible</legend>
					<label for ="0" class="not">No</label>
					<input type="radio" class="not2" name="visible" value="0">
					<label for ="1" class="not">Sí</label>
					<input type="radio" class="not2" name="visible" value="1" checked>
				</div>
			</fieldset>
			<label>Categoría</label>
			<select name="categoria">
<?php
	while ($row=mysql_fetch_array($sql)){
		echo '<option value="'.$row[0].'">'.$row[1].'</a>';
	}
?>
			</select>
			<label>Descripción</label>
			<textarea name="descripcion"></textarea>
			<fieldset>
				<legend>Imagen</legend>
				<input type="file" name="imagen">
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