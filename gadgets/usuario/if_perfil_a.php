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
		$sql= mysql_query("SELECT id,nombre,nombramiento,perfil,imagen,maill,celular,visible,categoria FROM usuario_index WHERE id = '$rubro' ",$link);
        while ($row = mysql_fetch_array($sql)){
			$id				= $row[0];
			$nombre			= $row[1];
			$nombramiento	= $row[2];
			$perfil			= $row[3];
			$imagen			= $row[4];
			$maill			= $row[5];
			$celular		= $row[6];
			$visible		= $row[7];
			$categoria		= $row[8];
		}
?>
	<div id="form-main">
		<form method="post" action="gadgets/usuario/ip_perfil_a.php" enctype="multipart/form-data">
	 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
		<input type="hidden" name="rubro" value="<?php echo $rubro ?>"><br><br>
		<div id="maincontent-tit">
			Modificar perfil<br><br>
		</div>
			<div id="maincontent-body">
				<table>
					<tr>
						<td rowspan="4">
						<img src="../<?php echo $_SESSION['admin']?>/images/perfil/<?php echo $imagen; ?>" height="200px"><br>
						</td>
						<td>                        Nombre:<br>
					<input type="text" name="nombre" size="40%" value="<?php echo $nombre ?>"><br><br>
                        Nombramiento:<br>
					<input type="text" name="nombramiento" size="40%" value="<?php echo $nombramiento ?>"><br><br>
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
					<input type="radio" name="visible" value="0" <?php echo $vis_no ?>>No<br><br></td>
					</tr>

	<tr>
		<td>
			Categoría:
			<select name="categoria">
<?php
$sqlCat=mysql_query("SELECT id,nombre FROM usuario_categoria ORDER BY id ASC ",$link);
while($rowCat=mysql_fetch_array($sqlCat)){
if($categoria!=$rowCat[0]){
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
		</td>
	</tr>
</table><div>		
                        Perfil:<br>
		<textarea name="perfil" rows=10 cols=80 ><?php echo $perfil ?></textarea><br><br>
<?php
		if(empty($imagen)){?>
			Imagen: 
			<input type="file" name="imagen" ><br><br><br>

<?php		}else{?>
			Imagen: <b><?php echo $imagen; ?></b><br>
			<a href="gadgets/usuario/borra_imagen.php?rubro=<?php echo $rubro; ?>">Borrar y cargar otra imagen</a><br><br><br>	
<?php } ?>			

                    e-mail:<br><input type="text" name="maill" size="50%" value="<?php echo $maill ?>"><br><br>
                    Celular:<br><input type="text" name="celular" size="100%" value="<?php echo $celular ?>"><br><br>
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