<?php
session_start();
include("../library/confirm.php");
if($_SESSION['privilegioss']=="ferbere"){
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
?>
<table cellpadding="0" width="600" align="center">
<form method="post" action="gadgets/descargar/ip_descargar_a.php" 	enctype="multipart/form-data">
	 <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
	<tr>
		<td colspan="2">
			<h1>Editar material</h1>
		</td>
	</tr>
		<tr>
			<td rowspan="3">
				<img src="../images/descargas/<?php echo $imagen; ?>" width="150px">		
			</td>
			<td>
				<?php
				if(empty($imagen)){?>
					Imagen: 
					<input type="file" name="imagen" ><br><br><br>

				<?php
				}else{?>
					Imagen: <b><?php echo $imagen; ?></b><br>
					<a href="gadgets/descargar/borra_imagen.php?rubro=<?php echo $id; ?>">Borrar y cargar otra imagen</a><br><br><br>	
				<?php
				} ?>
			</td>
		</tr>
			<tr>
				<td>
			<?php
			if($row[2]==1){
				$vissi='checked';
				$visno='nain';
			}elseif($row[2]==0){
				$vissi='nain';
				$visno='checked';
			}
			?>
					Visible <br>
					Sí<input type="radio" name="visible" value="1" <?php echo $vissi  ?>>
					No<input type="radio" name="visible" value="0" <?php echo $visno  ?>>
				</td>
				</tr>
				<tr>
					<td>Disponibilidad<br>
					<select name="disponible">
					<?php
					$usuario = array(2=>'Súperadmin',3=>'Usuarios',4=>'Prensa');
					for($i=2;$i<=4;$i++){
						if($row[3]==$i){
							$dispo='selected';
						}else{
							$dispo='';
						}
						echo '<option value="'.$i.'"'.$dispo.'>'.$usuario[$i].'</a>';
					}
					
					?>
						</select>
					</td>
			</tr>
				<tr>
					<td valign="bottom">
						<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
						</form>
					</td>
						<td>
						</td>
				</tr>
</table>
<?php
}
}else{
	echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
}
}else{
echo "Usted no tiene acceso a esta seccción";
}
?>