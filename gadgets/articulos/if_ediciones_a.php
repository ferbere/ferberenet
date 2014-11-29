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
		$sql=mysql_query("SELECT * FROM articulos_ediciones WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
			$nombre=$row['nombre'];
			$imagen=$row['imagen'];
			$ruta=$row['ruta'];
			$liberada=$row['liberada'];
		}
	?>
		<div id="form-main">
			<form method="post" action="gadgets/articulos/ip_ediciones_a.php">
			<div id="maincontent-tit">
				Modificar Edición<br><br>
			</div>
				<div id="maincontent-body">
					<div>
						Nombre:<br>
						<input type="text" name="nombre" size="30" value="<?php echo $nombre; ?>"><br><br>
						Imagen:<br><input type="text" name="imagen" size="30" value="<?php echo $imagen; ?>">.jpg<br><br>
						Ruta:<br>
						<input type="text" name="ruta" size="30" value="<?php echo $ruta; ?>"><br><br>
						Publicada:<br>
<?php
	if($liberada==1){
		$sip='checked';
		$nop='nain';	
	}else{
		$sip='nain';
		$nop='checked';				
	}
?>
	Sí<input type="radio" name="liberada" value="1"<?php echo $sip ?>>
	No<input type="radio" name="liberada" value="0"<?php echo $nop ?>>
	<br><br>
						<input type="hidden" name="rubro" value="<?php echo $rubro ?>"><br><br>
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