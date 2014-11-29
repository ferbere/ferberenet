<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	$link=Conectarse();
	include("../library/tinymce.php");
	include("../library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<div id="form-main">
		<form method="post" action="ip_resaque.php">
			<div id="maincontent-tit">
				Agregar Resaque<br><br>
			</div>
				<div id="maincontent-body">
					<div>
						Nombre:<br>
						<input type="text" name="nombre" size="80%"><br>
						Contenido:<br>
						<textarea name="contenido" rows=19 cols=80 width:300px height:40px></textarea><br>
						Vincula<br>
						<input type="text" name="vincula" size="5"><br><br>
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