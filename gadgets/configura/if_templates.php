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
		<form method="post" action="gadgets/configura/ip_templates.php" name="fvalida">
			<div id="maincontent-tit">
				Crear hoja de estilo
			</div>
				<div id="maincontent-body">
					<div>
						Página:<br>
				<input type="pagina" name="pagina" size="80%"><br>
						Hoja de estilo:<br>
				<input type="text" name="css" size="80%"><br>
						Título:<br>
				<input type="text" name="title" size="80%"><br>
						Cabezal:<br>
				<input type="text" name="header" size="30"><br><br>
						Botonera:<br>
				<input type="text" name="navbar" size="80%"><br>
						Logotipo:<br>
				<input type="text" name="logo" size="80%" ><br>
						Título de contenido:<br>
				<input type="text" name="tit_maincontent" size="80%"><br>
						Contenido principal:<br>
				<input type="text" name="maincontent" size="80%"><br>
						Objeto principal:<br>
				<input type="text" name="main_object" size="80%"><br>
						Detalle:<br>
				<input type="text" name="detail" size="80%" ><br>
						Pie de página:<br>
				<input type="text" name="footer" size="80%" ><br>
				</div>
					<div><h2>banners</h2>
						Banner 1:<br>
				<input type="text" name="bann1" size="80%" ><br>
						Banner 2:<br>
				<input type="text" name="bann2" size="80%" ><br>
						Banner 3:<br>
				<input type="text" name="bann3" size="80%" ><br>
						Banner 4:<br>
				<input type="text" name="bann4" size="80%" ><br>
						Banner 0:<br>
				<input type="text" name="bann0" size="80%" ><br>

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