<?php
session_start();
include("library/confirm.php");
include("library/tinymce.php");
if(($_SESSION['privilegioss']=="ferbere")||($_SESSION['privilegioss']=="admin")){
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
		$link=Conectarse();
		if(isset($_GET['rubro'])){
			$rubro=$_GET['rubro'];
		}
$sql= mysql_query("SELECT id,nombre,ruta,contenido,localidad,imagen,visible,orden FROM ligas_index WHERE id = '$rubro' ",$link);
while ($row = mysql_fetch_array($sql)){
	$id=$row[0];
	$nombre=$row[1];
	$ruta=$row[2];
	$contenido=$row[3];
	$localidad=$row[4];
	$imagen=$row[5];
	$visible=$row[6];
	$orden=$row[7];
}
	$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
	$url=mysql_fetch_array($sql_u);
	if($url[1]==''){
		$url_d='../'.$_SESSION["admin"].'/images/ligas/';
	}else{
		$url_d='http://'.$url[1].'/'.$_SESSION['admin'].'/images/ligas/';
	}
?>
		<form method="post" action="gadgets/ligas/ip_ligas_a.php" enctype="multipart/form-data" name="fvalida">
		 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
			<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
			<h1>Editar liga</h1>
			<img src="<?php echo $url_d.$imagen; ?>" width="150px">
			<label>Nombre</label>
			<input type="text" name="nombre" value="<?php echo $nombre ?>"/>
			<label>Ruta</label>
			<input type="text" name="ruta" value="<?php echo $ruta ?>"/>
			<fieldset>
			<legend>Imagen</legend> 
		<?php
		if(empty($imagen)){?>
			<input type="file" name="imagen"/>
<?php		}else{?>
			<?php echo $imagen; ?>
			<a href="gadgets/ligas/borra_imagen.php?rubro=<?php echo $id; ?>">Borrar y cargar otra imagen</a>
<?php } ?>
			</fieldset>
			<label>Contenido</label>
			<textarea name="contenido"><?php echo $contenido ?></textarea>
		<label>Orden</label>
		<input type="number" name="orden" value="<?php echo $orden ?>"/>
<?php
	if($visible==0){
		$vis_no="checked";
		$vis_si="nain";
	}elseif($visible==1){
		$vis_no="nain";
		$vis_si="checked";
	}
?>
		<fieldset>
		<legend>Visible</legend>
		<div class="radio">
			<input type="radio" class="not" name="visible" value="1" <?php echo $vis_si ?>>
			<label for="1" class="not2">Sí</label>
			<input type="radio" class="not" name="visible" value="0" <?php echo $vis_no ?>><label for="0" class="not2">No</label>
		</div>
		</fieldset>
							<input type="submit"  value="enviar">
							</form>
						</div>
				</div>
	</div>
<?
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
	echo "Usted no tiene acceso a esta sección";
}
?>