<?php
session_start();
if($_SESSION["privilegioss"]=="ferbere"){
	$link=Conectarse();
	include("../library/tinymce.php");
	include("../library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<div id="form-main">
		<form method="post" action="gadgets/patrocinador/ip_patrocinador.php" name="fvalida">
			<div id="maincontent-tit">
				Agregar patrocinador
			</div>
				<div id="maincontent-body">
					<div>
						Nombre:<br>
				<input type="text" name="nombre" size="80%"><br><br>
						Ruta:<br>
				<input type="text" name="ruta" size="80%"><br><br>
						Imagen:<br>
				<input type="text" name="imagen" size="50%"><br>
						Contenido:<br>
				<textarea name="contenido" rows=19 cols=80 width:300px height:40px></textarea><br>
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