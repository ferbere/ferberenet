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
		<form method="post" action="gadgets/agenda/ip_dia.php" name="fvalida">
			<div id="maincontent-tit">
				Agregar día a la agenda
			</div>
				<div id="maincontent-body">
					<div>
						<br><br>Número del día:<br>
				<input type="date" name="fecha" placeholder="YYYY-MM-DD"><br>
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
