<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<div id="form-main">
		<form method="post" action="gadgets/configura/ip_complex.php" name="fvalida">
			<div id="maincontent-tit">
				Crear celda en Complex Template<br><br>
			</div>
				<div id="maincontent-body">
					<div>
						Contenedor:<br>
						<input type="text" name="content" size="80%"><br><br>
						Publicado:<br><br>
						Sí <input type="radio" name="visible" value="1" size="30">
						No <input type="radio" name="visible" value="0" size="30" checked><br><br>
						Orden:
						<input type="number" name="orden"><br><br>
					</div>
						<div>
							<input type="submit" value="enviar">
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