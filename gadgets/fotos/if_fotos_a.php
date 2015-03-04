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
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
	if(empty($capturado)){
		$sql= mysql_query("SELECT id,nombre,subnombre,descripcion,imagen,categoria,visible,fecha FROM fotos_index WHERE id = '$rubro' ",$link);
		while ($row = mysql_fetch_array($sql)){
			$id 			= $row[0];
			$nombre 		= $row[1];
			$subnombre 		= $row[2];
			$descripcion 	= $row[3];
			$imagen 		= $row[4];
			$categoria	 	= $row[5];
			$visible	 	= $row[6];
			$fecha			= $row[7];
		}
		$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
		$url=mysql_fetch_array($sql_u);
		if($url[1]==''){
			$url_d='../'.$_SESSION["admin"].'/images/fotos/';
		}else{
			$url_d='http://'.$url[1].'/'.$_SESSION['admin'].'/images/fotos/';
		}
?>
		<form method="post" action="gadgets/fotos/ip_fotos_a.php" enctype="multipart/form-data">
		 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
			<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
			<h1>Modificar catálogo</h1>
			<img src="<?php echo $url_d.$imagen; ?>" width="150px">
			<label>Nombre:</label>
			<input type="text" name="nombre" value="<?php echo $nombre ?>">
			<label>Subnombre:</label>
			<input type="text" name="subnombre" value="<?php echo $subnombre ?>">
			<label>Fecha:</label>
			<input type="date" name="fecha" placeholder="YYYY-MM-DD" value="<?php echo $fecha ?>" />
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
		<label>Categoría</label>
		<select name="categoria">
					<?php
					$sqlCat=mysql_query("SELECT id,nombre FROM fotos_categoria ORDER BY id ASC ",$link);
					while($rowCat=mysql_fetch_array($sqlCat)){
							if($categoria!=$rowCat['id']){
								$hig= 'nain';
							}else{$hig="selected";}
								echo '<option value="'.$rowCat[0].'"'.$hig.'>'.$rowCat[1].'</option>';
							}
?>
		</select>
		<label>Descripción</label>
		<textarea name="descripcion"><?php echo $descripcion ?></textarea><br>
		<fieldset>
			<legend>Imagen</legend> 
		<?php
		if(empty($imagen)){?>
			<input type="file" name="imagen"/>
<?php		}else{?>
			<?php echo $imagen; ?>
			<a href="gadgets/fotos/borra_imagen.php?rubro=<?php echo $id; ?>">Borrar y cargar otra imagen</a>
<?php } ?>
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