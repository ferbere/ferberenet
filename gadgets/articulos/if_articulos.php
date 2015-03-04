<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	include_once("classes/mysql.php");
	$mysql=new MySQL();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
	<form method="post" action="gadgets/articulos/ip_articulos.php" enctype="multipart/form-data">
   	 <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
<?php
	$sql=$mysql->consulta("SELECT nombre FROM articulos_tag ORDER BY id DESC");
	$cuenta=$mysql->num_rows($sql);
	$sql2=$mysql->consulta("SELECT id,nombre FROM articulos_categoria");
	$sql3=$mysql->consulta("SELECT id,nombre FROM usuario_index");
?>
	<h1>Artículo nuevo</h1>
	<label>Título:</label>
	<input type="text" name="titulo">
	<label>Subtítulo:</label>
	<input type="text" name="subtitulo">
	<label>Sección:</label>
	<select name="categoria">
			<?php
			while ($row2=mysql_fetch_array($sql2)){
			echo '<option value="'.$row2['id'].'">'."\n".$row2['nombre']."</a>   ";
			}
			?>
	</select>
	<fieldset>
		<legend>Imagen:</legend>
		<input type="file" name="imagen" >
	</fieldset>
	<label>Contenido:</label>
	<textarea name="contenido"></textarea>
	<fieldset>
<?php
	if(($_SESSION['privilegioss']=='ferbere')OR($_SESSION['privilegioss']=='admin')){
?>
		<legend>Publicado:</legend>
		<div class="radio">
			<label for="1" class="not">Sí</label>
			<input type="radio" class="not2" name="publicado" value="1">
			<label for="0" class="not">No</label>
			<input type="radio" class="not2" name="publicado" value="0" checked>
		</div>
	</fieldset>
<?php } ?>
	<fieldset>
		<legend>Etiquetas:</legend>
		<?php
		$i=1;
		while($row=$mysql->fetch_array($sql)){
			echo '<input type="checkbox" name="tag[]" value="'.$i.'"/>';
			echo $row[0];
			$i=$i+1;
		}?>
	</fieldset>
		<label>Autor:</label>
		<select name="autor">
			<?php
			while ($row3=mysql_fetch_array($sql3)){
			echo '<option value="'.$row3['id'].'">'."\n".$row3['nombre']."</a>   ";
			}
			?>
		</select>
		<input type="hidden" name="cuenta" value="<?php echo $cuenta ?>">
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