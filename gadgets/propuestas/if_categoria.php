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
		<form method="post" action="gadgets/perfil/ip_categoria.php">
			<div id="maincontent-tit">
				Agregar categoría al perfil
			</div>
				<div id="maincontent-body">
					<div>
						Nombre:<br>
						<input type="text" name="nombre" size="30"><br>
						Imagen:<br>
						<input type="text" name="imagen" size="30">.jpg<br>
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