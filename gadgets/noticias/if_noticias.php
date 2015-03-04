<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	include_once("classes/conex.php");
	include("library/tinymce.php");
	include("library/confirm.php");
	$link=Conectarse();
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
		$sql_cat=mysql_query("SELECT id,nombre FROM noticias_categoria",$link);
?>
		<form method="post" action="gadgets/noticias/ip_noticias.php" enctype="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
			<h1>Noticia nueva</h1>
			<label>Título</label>
			<input type="text" name="titulo">
			<label>Subtítulo</label>
			<input type="text" name="subtitulo">
			<label>Fecha</label>
			<input type="date" name="fecha" placeholder="YYYY-MM-DD">
			<label>Categoría</label>
			<select name="categoria">
<?php
while ($row_cat=mysql_fetch_array($sql_cat)){
echo '<option value="'.$row_cat[0].'">'."\n".$row_cat[1]."</a>   ";
}
?>
			</select>
			<fieldset>
				<legend>Imagen</legend>
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
			<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
		</form>
<?php
	}elseif($capturado==1){
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}elseif($capturado==0){
		echo "Algo pasó. Así nomás, algo pasó.";
	}elseif($capturado==2){
		echo "hay un problema con la foto.";
	}
}else{
	echo "Usted no tiene acceso a esta seccción";
}
 ?>