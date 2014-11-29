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
		$sql=mysql_query("SELECT id,nombre,imagen FROM banners_dir WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
			$id 	=$row[0];
			$nombre =$row[1];
			$imagen =$row[2];
		}
	?>
		<div id="form-main">
			<form method="post" action="gadgets/banners/ip_maqueta_a.php">
			<div id="maincontent-tit">
				Modificar maqueta de banners<br><br>
			</div>
				<div id="maincontent-body">
					<div>
						Nombre:<br>
						<input type="text" name="nombre" size="30" value="<?php echo $nombre; ?>"><br><br>
						Imagen:<br><input type="text" name="imagen" size="30" value="<?php echo $imagen; ?>">.jpg<br><br>
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