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
		$sql= mysql_query("SELECT catalogo_index.id,catalogo_index.nombre,catalogo_index.subnombre,catalogo_index.visible,catalogo_index.categoria,catalogo_index.descripcion,catalogo_index.imagen,catalogo_index.existe,catalogo_index.precio,catalogo_index.dimensiones,catalogo_index.orden FROM catalogo_index   WHERE catalogo_index.id = '$rubro' ",$link);
        while ($row = mysql_fetch_array($sql)){
			$id		 		= $row[0];
			$nombre 		= $row[1];
			$subnombre		= $row[2];
			$visible		= $row[3];
			$categoria		= $row[4];
			$descripcion	= $row[5];
			$imagen			= $row[6];
			$existe			= $row[7];
			$precio			= $row[8];
			$dimensiones	= $row[9];
			$orden			= $row[10];
		}
		$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
		$url=mysql_fetch_array($sql_u);
		if(empty($url[1])){
			$url_c='http://localhost/';
		}else{
			$url_c='http://'.$url[1].'/';
		}
		$path=$url_c.$_SESSION['admin'].'/images/catalogo/';
?>
	<div id="form-main">
		<form method="post" action="gadgets/catalogo/ip_catalogo_a.php" enctype="multipart/form-data">
	 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
		<input type="hidden" name="rubro" value="<?php echo $rubro ?>"><br><br>
		<div id="maincontent-tit">
			Modificar catálogo<br><br>
		</div>
			<div id="maincontent-body">
				<table>
					<tr>
						<td rowspan="2">
						<img src="<?php echo $path.$imagen; ?>" height="200px"><br>
						</td>
						<td></td>
					<tr>
						<td></td><td>
                        Nombre:<br>
					<input type="text" name="nombre" size="40%" value="<?php echo $nombre ?>"><br><br>
                    	Subnombre:<br>
					<input type="text" name="subnombre" size="60%" value="<?php echo $subnombre ?>"><br><br>
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
					$sqlCat=mysql_query("SELECT id,nombre FROM catalogo_categoria ORDER BY id ASC ",$link);
					while($rowCat=mysql_fetch_array($sqlCat)){
							if($categoria!=$rowCat['id']){
								$hig= 'nain';
								}else{$hig="selected";}
								echo '<option value="'.$rowCat['id'].'"'.$hig.'>'.$rowCat['nombre'].'</option>';
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
			<a href="gadgets/catalogo/borra_imagen.php?borra=1&rubro=<?php echo $rubro; ?>">Borrar y cargar otra imagen</a><br><br><br>	
<?php } ?>			
<br><br>
                    Existencias:<br><input type="number" name="existe"  value="<?php echo $existe ?>"><br><br>
                    Precio:<br>$<input type="text" name="precio" size="30%" value="<?php echo $precio ?>"><br><br>                        
                    Dimensiones:<br><input type="text" name="dimensiones" size="30%" value="<?php echo $dimensiones ?>"><br><br>                        
                    Orden:<br><input type="text" name="orden" size="30%" value="<?php echo $orden ?>"><br><br>
					</div>
<?php
//            }
?>
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