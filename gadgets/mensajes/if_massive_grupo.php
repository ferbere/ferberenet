<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	$link=Conectarse();
	include("../library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<div id="form-main">
		<form method="post" action="gadgets/mensajes/ip_massive_grupo.php">
			<div id="maincontent-tit">
				Crea Grupo Envío
			</div>
				<div id="maincontent-body">
					<div>
						Nombre:<br>
						<input type="text" name="nombre" size="30" placeholder="Nombre del grupo"><br>
						Imagen:<br>
						<input type="text" name="imagen" placeholder="Imagen" size="30">.jpg<br>
						Descripción:<br>
						<textarea name="descripcion" cols="40" rows="6" placeholder="Breve descripción, por favor"></textarea><br>
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