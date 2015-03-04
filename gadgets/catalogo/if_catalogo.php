<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")||($_SESSION["privilegioss"]=="directivo")){
	include_once('classes/conex.php');
	$link=Conectarse();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if($capturado==''){
?>
	<form method="post" action="gadgets/catalogo/ip_catalogo.php" enctype="multipart/form-data">
   	 <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
	<h1>Agregar catálogo</h1>
	<label>Nombre:</label>
	<input type="text" name="nombre">
	<label>Subnombre:</label>
	<input type="text" name="subnombre">
<?php
		if($visible==1){
			$vis_si='checked';
			$vis_no='nain';
		}elseif($visible==0){
			$vis_si='nain';
			$vis_no='checked';

		}
?>
	<fieldset>
		<legend>Visible:</legend>
		<div class="radio">
			<label class="not" for="1">Sí</label>
			<input type="radio" name="visible" value="1" class="not2">
			<label class="not" for=0>No</label>
			<input type="radio" name="visible" value="0" class="not2" checked>
		</div>
	</fieldset>
	<label>Categoría:</label>
	<select name="categoria">
<?php
$sqlCat=mysql_query("SELECT id,nombre FROM catalogo_categoria ORDER BY id ASC ",$link);
while($rowCat=mysql_fetch_array($sqlCat)){
	echo '<option value="'.$rowCat['id'].'">'.$rowCat['nombre'].'</option>';						}
?>
	</select><br><br>

			<label>Descripción:</label>
			<textarea name="descripcion"></textarea>
			<label>Imagen:</label>
			<input type="file" name="imagen">
			<label>Existencias:</label>
			<input type="number" name="existe">
	        <label>Precio:</label>
	        <input type="text" name="precio">
			<label>Dimensiones:</label>
			<input type="text" name="dimensiones">
			<label>Orden:</label>
			<input type="text" name="orden">
			<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
			</form>
<?php
	}elseif($capturado==0){
		echo "Algo pasó. Así nomás, algo pasó y nada se capturó.";
	}elseif($capturado==1){
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}elseif($capturado==2){
		echo "Se ha capturado el contenido. No había archivo que subir al servidor.";
	}elseif($capturado==3){
		echo "No se ha capturado el contenido porque el archivo no se ha podido subir al servidor.";
	}
}else{
	echo "Usted no tiene acceso a esta seccción";
}
 ?>