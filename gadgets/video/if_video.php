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
		<form method="post" action="gadgets/video/ip_video.php">
			<div id="maincontent-tit">
				Agregar video
			</div>
				<div id="maincontent-body">
					<div>
							Nombre:<br>
			<input type="text" name="nombre" size="50"><br><br>
							Fecha:<br>
			<input type="text" name="fecha" size="50"><br><br>
							Descripción:<br>
			<textarea name="descripcion" rows=19 cols=70 width:300px height:40px></textarea><br>
							Liga:<br>
			<input type="text" name="liga" size="50"><br></br>

							Visible:</br>
			<input type="radio" name="visible" value="0" checked>No  
			<input type="radio" name="visible" value="1">Sí  
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
include("style/footer_admin.html"); ?>