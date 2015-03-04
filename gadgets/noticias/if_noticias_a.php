<?php
session_start();
include("library/tinymce.php");
include("library/confirm.php");
if(($_SESSION['privilegioss']=="ferbere")||($_SESSION['privilegioss']=="admin")){
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
		$link=Conectarse();
		if(isset($_GET['rubro'])){
			$rubro=$_GET['rubro'];
		}
	$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
	$url=mysql_fetch_array($sql_u);
	if($url[1]==''){
		$url_d='../'.$_SESSION["admin"].'/images/noticias/';
	}else{
		$url_d='http://'.$url[1].'/'.$_SESSION['admin'].'/images/noticias/';
	}
?>
<form method="post" action="gadgets/noticias/ip_noticias_a.php" enctype="multipart/form-data">
 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
	<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
<?php
$sql= mysql_query("SELECT id,titulo,subtitulo,contenido,publicado,fecha,imagen,orden,categoria FROM noticias_index WHERE id = '$rubro' ",$link);
while ($row = mysql_fetch_array($sql)){
	$id 			=	$row[0]; 
	$titulo			=	$row[1]; 
	$subtitulo		=	$row[2]; 
	$contenido		=	$row[3]; 
	$publicado		=	$row[4]; 
	$fecha			=	$row[5]; 
	$imagen			=	$row[6]; 
	$orden			=	$row[7]; 
	$categoria 		= 	$row[8];
}
?>
	<h1>Editar noticia</h1>
	<img src="<?php echo $url_d.$imagen; ?>" height="200px"><br>
	<label>Título</label>
	<input type="text" name="titulo" value="<?php echo $titulo ?>" />
	<label>Subtítulo</label>
	<input type="text" name="subtitulo" value="<?php echo $subtitulo ?>" />
	<label>Fecha</label>
	<input type="date" name="fecha" value="<?php echo $fecha ?>" />
	<fieldset>
	<legend>Imagen</legend>
			<?php
			if(empty($imagen)){?>
				<input type="file" name="imagen" >

	<?php	}else{?>
				<?php echo $imagen; ?>
				<a href="gadgets/noticias/borra_imagen.php?borra=1&rubro=<?php echo $id; ?>">Borrar y cargar otra imagen</a>
	<?php } ?>
	</fieldset>		
	<label>Categoría</label>
	<select name="categoria">
<?php
$sqlCat=mysql_query("SELECT id,nombre FROM noticias_categoria ORDER BY id ASC ",$link);
while($rowCat=mysql_fetch_array($sqlCat)){
	if($categoria!=$rowCat['id']){
		$cat= 'nain';
	}else{
		$cat="selected";
	}?>
	<option value="<?php echo $rowCat['id']; ?>"<?php echo $cat;?>>
		<?php echo $rowCat['nombre'];?>
	</option>
<?php }
?>
	</select>
	<label>Orden</label>
	<input type="number" name="orden" value="<?php echo $orden ?>">
<?php
if($publicado==0){
	$publino="checked";
	$publisi="nain";
}elseif($publicado==1){
	$publino="nain";
	$publisi="checked";
}
?>
	<fieldset>
		<legend>Publicado:</legend>
		<div id="radio">
		<input type="radio" class="not" name="visible" value="0" <?php echo $visi_no ?>>
		<label for="0" class="not2">No</label>
		<input type="radio" class="not" name="visible" value="1" <?php echo $visi_si ?>>
		<label for="1" class="not2">Sí</label>
	</fieldset>
<?php
/*		if($categoria==2){
			$cadena = $contenido;
			$ejemplo = strlen($cadena);
			echo "El texto mide: $ejemplo caracteres (con espacios), y";
			if($ejemplo<400){
				echo ' aparecerá completo en la página principal.';
			}else{
				echo ' un extracto del texto aparecerá en la página principal, y la liga a "leer más."';
			}
		}*/
?>
	<label>Contenido</label>
	<textarea name="contenido"><?php echo $contenido ?></textarea>
	<input type="submit"  value="enviar">
</form>
<?php
		
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
echo "Usted no tiene acceso a esta sección";
}		
?>
