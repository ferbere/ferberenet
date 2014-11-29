<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
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
	?>
		<div id="form-main">
			<form method="post" action="gadgets/banners/ip_banner_a.php" enctype="multipart/form-data">
			 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
			<div id="maincontent-tit">
				Modificar banner<br><br>
			</div>
				<div id="maincontent-body">
					<div>
						<div style="text-align:center">
							<img src="../<?php echo $_SESSION['admin']?>/images/banners/<?php echo $imagen; ?>" height="200px"><br>
						</div>
							<div>
								Nombre:<br>
				<input type="text" name="nombre" size="30" value="<?php echo $nombre; ?>"><br><br>
								Orientaci&oacute;n:
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
				</select><br><br>

								Contenido:<br>
				<textarea name="contenido" rows=19 cols=70 width:300px height:40px><?php echo $contenido ?></textarea>
								Orden:<br>
				<input type="text" name="orden" size="30" value="<?php echo $orden; ?>"><br>
								Liga:<br>
				<input type="text" name="liga" size="100" value="<?php echo $liga; ?>"><br>
						<?php
						if(empty($imagen)){?>
							Imagen: 
							<input type="file" name="imagen" ><br><br><br>

				<?php	}else{?>
							Imagen: <b><?php echo $imagen; ?></b><br>
							<a href="gadgets/banners/borra_imagen.php?rubro=<?php echo $id; ?>">Borrar y cargar otra imagen</a><br><br><br>	
				<?php } ?>			

								Banner:<br>
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
				</select><br><br>
			<?php
			if($visible==1){
				$visi_no='nain';
				$visi_si='checked';
			}elseif($visible==0){
				$visi_no='checked';
				$visi_si='nain';
				
			}
			?>
							Publicado:<br>
				<input type="radio" name="visible" value="0" <?php echo $visi_no ?>>No
				<input type="radio" name="visible" value="1" <?php echo $visi_si ?>>S&iacute;<br>			
				<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
							</div>
						</div>
								<div>
				<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
				</form>
								</div>
			</div>
<?php
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
	echo "Usted no tiene acceso a esta seccción";
}
?>