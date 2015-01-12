<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	$link=Conectarse();
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<div id="form-main">
		<form method="post" action="gadgets/prospecta/ip_edicion.php" name="fvalida">
			<div id="maincontent-tit">
				Agregar Edición
			</div>
				<div id="maincontent-body">
					<div>
						Número:<br>
				<input type="number" name="numero" size="80%"><br><br>
						Desde:<br>
				<input type="date" name="desde" placeholder="AAAA/MM/DD"><br><br>
						Hasta:<br>
				<input type="date" name="hasta" placeholder="AAAA/MM/DD"><br><br>
						Visible:<br>
				Sí <input type="radio" name="visible" value="1" size="30">
				No <input type="radio" name="visible" value="0" size="30" checked><br><br>
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