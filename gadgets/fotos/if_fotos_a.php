<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
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
?>
	<div id="form-main">
		<form method="post" action="gadgets/fotos/ip_fotos_a.php" enctype="multipart/form-data">
		 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
			<input type="hidden" name="rubro" value="<?php echo $rubro ?>"><br><br>
		<div id="maincontent-tit">
			Modificar catálogo<br><br>
		</div>
			<div id="maincontent-body">
				<table>
					<tr>
						<td rowspan="2">
							<img src="../<?php echo $_SESSION['admin']?>/images/fotos/<?php echo $imagen; ?>" width="150px">
						</td>
						<td></td>
					<tr>
						<td></td><td>
                        Nombre:<br>
					<input type="text" name="nombre" size="40%" value="<?php echo $nombre ?>"><br><br>
                    	Subnombre:<br>
					<input type="text" name="subnombre" size="60%" value="<?php echo $subnombre ?>"><br><br>
						Fecha:<br>
					<input type="date" name="fecha" placeholder="YYYY-MM-DD" value="<?php echo $fecha ?>" /><br><br>
<?php
		if($visible==1){
			$vis_si='checked';
			$vis_no='nain';
		}elseif($visible==0){
			$vis_si='nain';
			$vis_no='checked';
			
		}
?>
						Visible:
					<input type="radio" name="visible" value="1" <?php echo $vis_si ?>>Sí
					<input type="radio" name="visible" value="0" <?php echo $vis_no ?>>No<br><br>
					Categoría:<br><br><select name="categoria">
					<?php
					$sqlCat=mysql_query("SELECT id,nombre FROM fotos_categoria ORDER BY id ASC ",$link);
					while($rowCat=mysql_fetch_array($sqlCat)){
							if($categoria!=$rowCat['id']){
								$hig= 'nain';
							}else{$hig="selected";}
								echo '<option value="'.$rowCat[0].'"'.$hig.'>'.$rowCat[1].'</option>';
							}
					echo '</select>';
?><br><br>
		</td>
	<tr>
</table><div>		
                        Descripción:<br>
		<textarea name="descripcion" rows=10 cols=80 ><?php echo $descripcion ?></textarea><br><br>
				<?php
				if(empty($imagen)){?>
					Imagen: 
					<input type="file" name="imagen" ><br><br><br>

		<?php		}else{?>
					Imagen: <b><?php echo $imagen; ?></b><br>
					<a href="gadgets/fotos/borra_imagen.php?rubro=<?php echo $id; ?>">Borrar y cargar otra imagen</a><br><br><br>	
		<?php } ?>
                    		</div>
                            	<div>
                                    <input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
			</form>
                                </div>
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