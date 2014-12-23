<?php
session_start();
if($_SESSION["privilegioss"]=="ferbere"){
	$link=Conectarse();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
	?>
		<div id="form-main">
			<div align="justify">
				<div>
					<form method="get" action="gadgets/gadgets/ip_gadgets.php">
					<h1>Agregar gadget</h1>
				</div>
					<div>
						Gadget:<br><input type="text" name="gadget" size="30"><br>
						Alias:<br><input type="text" name="alias" size="30"><br>
						Ruta:<br><input type="text" name="rutas" size="30"><br>
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