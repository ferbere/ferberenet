<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	$link=Conectarse();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<div id="form-main">
		<form method="post" action="gadgets/usuario/ip_privilegios.php">
			<div id="maincontent-tit">
				Agregar Privilegios
			</div>
				<div id="maincontent-body">
					<div><br>
						Nombre:<br>
						<input type="text" name="nombre" size="30"><br>
<!--						Visible:<br>
						Sí <input type="radio" name="visible" value="1" size="30">
						No <input type="radio" name="visible" value="0" size="30" checked>-->
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