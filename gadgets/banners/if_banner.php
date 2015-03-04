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
	<form method="post" action="gadgets/banners/ip_banner.php" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
		<h1>Agregar banner</h1>
		<label>Nombre</label>
		<input type="text" name="nombre">
		<label>Orientación</label>
		<select name="orientacion">
<?php
$sql_orie=mysql_query("SELECT id,nombre FROM general_orientacion",$link);
while ($row_orie=mysql_fetch_array($sql_orie)){
	echo '<option value="'.$row_orie['id'].'">'.$row_orie['nombre'].'</a><br>';
}
?>
		</select>
		<label>Contenido</label>
		<textarea name="contenido"></textarea>
		<fieldset>
			<legend>Imagen</legend>
			<input type="file" name="imagen" >
		</fieldset>
		<label>Banner</label>
		<select name="banner">
	<?php
	$sql_bann=mysql_query("SELECT id,nombre FROM banners_dir",$link);
	while ($row_bann=mysql_fetch_array($sql_bann)){
		echo '<option value="'.$row_bann['id'].'">'.$row_bann['nombre'].'</a><br>';
	}
	?>
		</select>
		<label>Liga</label>
		<input type="text" name="liga">
		<fieldset>
			<legend>Publicado:</legend>
			<div class="radio">
				<label for="1" class="not">Sí</label>
				<input type="radio" class="not2" name="publicado" value="1">
				<label for="0" class="not">No</label>
				<input type="radio" class="not2" name="publicado" value="0" checked>
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