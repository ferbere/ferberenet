<?php
session_start();
if(isset($_GET['ruta'])){
	$ruta=$_GET['ruta'];
}
include_once("classes/privilegios.class.php");
$pr=new privilegios($_SESSION['user'],$ruta);
$orr=$pr->pRiv();
if($_SESSION["privilegioss"]>=$orr){
	$link=Conectarse();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
	<div id="form-main">
		<form method="post" action="gadgets/usuario/ip_autor.php">
		<div id="maincontent-tit">
			Dar de alta usuario<br><br>
		</div>
			<div id="maincontent-body">
				<div align="left">
					<div style="float: left">
						Usuario:<br>
						<input type="text" name="user">
					</div>
						<div style="float: left; position: relative; left: 50px">
						Contraseña:<br>
						<input type="password" name="passwd">
						</div>
				</div>
					<div style="clear: both">
						<div>
							Nombre completo:<br>
							<input type="text" name="nombre" size="100"><br><br>
							domicilio:<br>
							<input type="text" name="domicilio" size="100"><br><br>
							Población:<br>
							<input type="text" name="poblacion" size="100"><br><br><br><br>
						</div>
							<div style="float: left">
								e-mail:<br>
								<input type="text" name="maill" size="25"><br>
							</div>
								<div style="float: left; position: relative; left: 50px">
									Teléfono:<br>
									<input type="text" name="telefono" size="15"><br><br>
								</div>
									<div style="float: left; position: relative; left: 120px">
										Teléfono celular:<br>
										<input type="text" name="celular" size="15"><br><br>
									</div>
						</div>
					<div style="clear: both">
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