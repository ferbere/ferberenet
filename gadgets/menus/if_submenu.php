<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
	<div id="form-main">
		<form method="post" action="gadgets/menus/ip_submenu.php">
		<div id="maincontent-tit">
			Agregar Submenú
		</div>
		<div id="maincontent-body">
			<div>
				Nombre:<br>
				<input type="text" name="nombre" size="30">
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