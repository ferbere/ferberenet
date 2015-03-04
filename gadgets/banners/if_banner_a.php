<?php
session_start();
if(($_SESSION['privilegioss']=="ferbere")||($_SESSION['privilegioss']=="admin")){
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
		$sql=mysql_query("SELECT id,imagen,orientacion,visible,nombre,contenido,orden,banner,liga FROM banners_index WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
			$id			= $row[0];
			$imagen		= $row[1];
			$orientacion	= $row[2];
			$visible	= $row[3];
			$nombre 	= $row[4];
			$contenido 	= $row[5];
			$orden 		= $row[6];
			$banner		= $row[7];
			$liga		= $row[8];
		}
	$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
	$url=mysql_fetch_array($sql_u);
	if($url[1]==''){
		$url_d='../'.$_SESSION["admin"].'/images/banners/';
	}else{
		$url_d='http://'.$url[1].'/'.$_SESSION['admin'].'/images/banners/';
	}
	?>
			<form method="post" action="gadgets/banners/ip_banner_a.php" enctype="multipart/form-data">
			 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
				<h1>Modificar banner</h1>
				<img src="<?php echo $url_d.$imagen; ?>" height="200px"><br>
				<label>Nombre:</label>
				<input type="text" name="nombre" size="30" value="<?php echo $nombre; ?>">
				<label>Orientación:</label>
				<select name="orientacion">
			<?php
				$sql_orie=mysql_query("SELECT id,nombre FROM general_orientacion ",$link);
				while ($row_orie=mysql_fetch_array($sql_orie)){
					if($row_orie[0]!=$orientacion){
						$hig_orie='nain';
					}else{
						$hig_orie='selected';
					}
					echo '<option value="'.$row_orie[0].'"'.$hig_orie.'>'.$row_orie[1].'</a>';
				}
			?>
				</select>
				<label>Contenido:</label>
				<textarea name="contenido"><?php echo $contenido ?></textarea>
				<label>Orden:</label>
				<input type="text" name="orden" value="<?php echo $orden; ?>">
				<label>Liga:</label>
				<input type="text" name="liga" size="100" value="<?php echo $liga; ?>">
				<fieldset>
				<legend>Imagen</legend>
						<?php
						if(empty($imagen)){?>
							<input type="file" name="imagen" >

				<?php	}else{?>
							<?php echo $imagen; ?>
							<a href="gadgets/banners/borra_imagen.php?borra=1&rubro=<?php echo $id; ?>">Borrar y cargar otra imagen</a>
				<?php } ?>
				</fieldset>	
				<label>Banner:</label>
				<select name="banner">
			<?php
				$sql_bann=mysql_query("SELECT id,nombre FROM banners_dir ",$link);
				while ($row_bann=mysql_fetch_array($sql_bann)){
					if($row_bann['id']!=$banner){
						$hig='nain';
					}else{
						$hig='selected';
					}
					echo '<option value="'.$row_bann['id'].'"'.$hig.'>'.$row_bann['nombre'].'</a>';
				}
			?>
				</select>
			<?php
			if($visible==1){
				$visi_no='nain';
				$visi_si='checked';
			}elseif($visible==0){
				$visi_no='checked';
				$visi_si='nain';
				
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