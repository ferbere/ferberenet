<?php
session_start();
include("library/confirm.php");
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
		$link=Conectarse();
		if(isset($_GET['rubro'])){
			$rubro=$_GET['rubro'];
		}
	$sql=mysql_query("SELECT id,imagen,visible,disponible FROM descargar_index WHERE id = '$rubro' ");
	while($row=mysql_fetch_array($sql)){
		$id 		= $row[0];
		$imagen 	= $row[1];
		$visible 	= $row[2];
		$disponible = $row[3];
	}

		$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
		$url=mysql_fetch_array($sql_u);
		if($url[1]==''){
			$url_d='../'.$_SESSION["admin"].'/images/descargas/';
		}else{
			$url_d='http://'.$url[1].'/'.$_SESSION['admin'].'/images/descargas/';
		}
?>
	<form method="post" action="gadgets/descargar/ip_descargar_a.php" 	enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
		<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
		<h1>Editar material</h1>
		<img src="<?php echo $url_d.$imagen; ?>" width="200px">
		<fieldset>
			<legend>Imagen</legend>
	<?php
			if(empty($imagen)){?>
				<input type="file" name="imagen">

	<?php		}else{?>
			<?php echo $imagen; ?>
				<a href="gadgets/descargar/borra_imagen.php?rubro=<?php echo $rubro; ?>">Borrar y cargar otra imagen</a>
	<?php } ?>			
		</fieldset>
			<?php
			if($visible==1){
				$vissi='checked';
				$visno='nain';
			}elseif($visible==0){
				$vissi='nain';
				$visno='checked';
			}
			?>
		<fieldset>
			<legend>Visible</legend>
			<div id="radio">
				<label for="1" class="not">Sí</label>
				<input type="radio" name="visible" value="1" class="not2" <?php echo $vissi ?>>
				<label for="0" class="not">No</label>
				<input type="radio" name="visible" value="0" class="not2" <?php echo $visno ?>>
			</div>
		</fieldset>
		<label>Disponibilidad</label>
		<select name="disponible">
	<?php
	$sql_d=mysql_query("SELECT id,nombre FROM usuario_privilegios WHERE id > 2 ORDER BY id ASC ",$link);
	while($row_d=mysql_fetch_array($sql_d)){
		if($disponible!=$row_d[0]){
			$cat= 'nain';
		}else{
			$cat="selected";
		}?>
		<option value="<?php echo $row_d[0]; ?>"<?php echo $cat;?>>
			<?php echo $row_d[1];?>
		</option>
<?php } ?>
		</select>
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