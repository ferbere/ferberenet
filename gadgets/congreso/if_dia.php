<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	include("../library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<div id="form-main">
		<form method="post" action="gadgets/congreso/ip_dia.php" name="fvalida">
			<div id="maincontent-tit">
				Agregar día al Congreso
			</div>
				<div id="maincontent-body">
					<div>
						<br><br>Nombre del día:<br>
				<input type="text" name="nombre" size="80%"><br>
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