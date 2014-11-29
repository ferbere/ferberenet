<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	$link=Conectarse();
	include("../library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
	if(empty($capturado)){
		$sql=mysql_query("SELECT * FROM mails_massive_grupo WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
			$nombre=$row['nombre'];
			$imagen=$row['imagen'];
			$descripcion=$row['descripcion'];
		}
?>
		<div id="form-main">
		<form method="post" action="gadgets/mensajes/ip_massive_grupo_a.php">
			<div id="maincontent-tit">
				Modificar Grupo Envío
			</div>
				<div id="maincontent-body">
					<div>
						Nombre:<br>
						<input type="text" name="nombre" size="30" value="<?php echo $nombre ?>"><br>
						Imagen:<br>
						<input type="text" name="imagen" value="<?php echo $imagen ?>" size="30">.jpg<br>
						Descripción:<br>
						<textarea name="descripcion" cols="40" rows="6" ><?php echo $descripcion ?></textarea><br>
					<input type="hidden" name="rubro" value="<?php echo $rubro ?>"><br><br>

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