<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	$link=Conectarse();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<div id="form-main">
		<form method="post" action="gadgets/articulos/ip_ediciones.php">
			<div id="maincontent-tit">
				Agregar Edición
			</div>
				<div id="maincontent-body">
					<div>
						Nombre:<br>
						<input type="text" name="nombre" size="30"><br>
						Imagen:<br>
						<input type="text" name="imagen" size="30">.jpg<br>
						Ruta:<br>
						<input type="text" name="ruta" size="30"><br>						
						Publicada:<br>
						Sí<input type="radio" name="liberada" value="1">													
						No<input type="radio" name="liberada" value="0" checked><br><br>
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