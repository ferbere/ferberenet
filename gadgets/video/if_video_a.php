<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	$link=Conectarse();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
	if(empty($capturado)){
		$sql=mysql_query("SELECT id,nombre,fecha,liga,descripcion,visible FROM video_index WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
			$id=$row[0];
			$nombre=$row[1];
			$fecha=$row[2];
			$liga=$row[3];
			$descripcion=$row[4];
			$visible=$row[5];
		}
	?>
		<form method="post" action="gadgets/video/ip_video_a.php">
		<h1>Modificar Videos</h1>
		<iframe width="420" height="315" src="<?php echo $liga?>" frameborder="0" allowfullscreen>
		</iframe>
<!--		<video width="320" height="240" controls="controls">
		  	<source src="../images/<?php echo $row['liga']?>.mov"  />
		</video>-->
		<label>Nombre</label>
		<input type="text" name="nombre" value="<?php echo $nombre; ?>">
		<label>Fecha</label>
		<input type="text" name="fecha" value="<?php echo $fecha; ?>">
		<label>Liga</label>
		<input type="text" name="liga" value="<?php echo $liga; ?>">
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
		<legend>Visible</legend>
		<div class="radio">
			<input type="radio" class="not" name="visible" value="1" <?php echo $vis_si ?>>
			<label for="1" class="not2">Sí</label>
			<input type="radio" class="not" name="visible" value="0" <?php echo $vis_no ?>><label for="0" class="not2">No</label>
		</div>
		</fieldset>
		<label>Descripción</label>
		<textarea name="descripcion"><?php echo $descripcion ?></textarea>
		<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
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