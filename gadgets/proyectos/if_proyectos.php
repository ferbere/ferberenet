<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	$link=Conectarse();
	include("../library/tinymce.php");
	include("../library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
		?>
		<div id="form-main">
		<form method="post" action="gadgets/proyectos/ip_proyectos.php" name="fvalida">
			<div id="maincontent-tit">
				Agregar proyecto
			</div>
				<div id="maincontent-body">
					<div>
						Título:<br>
				<input type="text" name="titulo" size="80%"><br>
						Cliente:<br>
				<input type="text" name="cliente" size="80%"><br>
						Fecha:
				<input type="text" name="fecha" size="30"><br><br>
						Proyecto:<br>
				<input type="text" name="proyecto" size="80%"><br>
				</div>
					<div>
						Contenido:<br>
				<textarea name="contenido" rows=19 cols=80 width:300px height:40px></textarea><br>
<?php
		if(($_SESSION['privilegioss']=='ferbere')OR($_SESSION['privilegioss']=='ferbere')){
?>
				Publicado:<br>
				Sí <input type="radio" name="publicado" value="1" size="30">
				No <input type="radio" name="publicado" value="0" size="30" checked><?php } ?>
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