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
	$sql= mysql_query("SELECT id,titulo,subtitulo,contenido,publicado,imagen,orden FROM corporativa_index WHERE id = '$rubro' ",$link);
	while ($row = mysql_fetch_array($sql)){
		$id					= $row[0];
		$titulo				= $row[1];
		$subtitulo			= $row[2];
		$contenido			= $row[3];
		$publicado			= $row[4];
		$imagen				= $row[5];
		$orden				= $row[6];
	}
		$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
		$url=mysql_fetch_array($sql_u);
		if($url[1]==''){
			$url_d='../'.$_SESSION["admin"].'/images/corporativa/';
		}else{
			$url_d='http://'.$url[1].'/'.$_SESSION['admin'].'/images/corporativa/';
		}
?>
	<h1>Edita información corporativa</h1>
	<form method="post" action="gadgets/corporativa/ip_corporativa_a.php" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
		<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
		<img src="<?php echo $url_d.$imagen; ?>" height="200px"><br>
		<label>Título</label>
		<input type="text" name="titulo" value="<?php echo $titulo ?>"/>
		<label>Subtítulo</label>
		<input type="text" name="subtitulo" value="<?php echo $subtitulo ?>"/>
		<fieldset>
			<legend>Imagen</legend>
	<?php
			if(empty($imagen)){?>
				<input type="file" name="imagen">

	<?php		}else{?>
			<?php echo $imagen; ?>
				<a href="gadgets/corporativa/borra_imagen.php?rubro=<?php echo $rubro; ?>">Borrar y cargar otra imagen</a>
	<?php } ?>			
		</fieldset>
		<label>Orden</label>
		<input type="text" name="orden" value="<?php echo $orden?>">
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
			<div id="radio">
				<legend>Publicado</legend>
				<label for="1" class="not">Sí</label>
				<input type="radio" class="not2" name="publicado" value="1"<?php echo $publisi ?>>
				<label for="0" class="not">No</label>
				<input type="radio" class="not2" name="publicado" value="0" <?php echo $publino ?>>
			</div>
		</fieldset>
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
