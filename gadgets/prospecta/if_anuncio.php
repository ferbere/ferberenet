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
		<form method="post" action="gadgets/prospecta/ip_anuncio.php" name="fvalida">
			<div id="maincontent-tit">
				Agregar Anuncio
			</div>
				<div id="maincontent-body">
					<div>
						Nombre:<br>
				<input type="text" name="nombre" size="80%"><br><br>
						Medidas:<br>
				<input type="text" name="medidas" size="80%"><br><br>
						Precio:<br>$
				<input type="text" name="precio" size="30%"><br><br>
						Visible:<br>
				S� <input type="radio" name="visible" value="1" size="30">
				No <input type="radio" name="visible" value="0" size="30" checked><br><br>
				</div>
						<div>
							<input type="submit" value="enviar">
					</form>
						</div>
				</div>
<?php
	}else{
		echo "El contenido ha sido capturado, debidamente. �Muy bien!";
	}
}else{
echo "Usted no tiene acceso a esta seccci�n";
}
?>