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
		<form method="post" action="gadgets/agenda/ip_imparte.php" name="fvalida">
			<div id="maincontent-tit">
				Agregar ponente a la Agenda
			</div>
				<div id="maincontent-body">
					<div>
						<br><br>Ponente:<br>
				<input type="text" name="nombre" size="80%"><br>
						Perfil:<br>
				<input type="text" name="perfil" size="80%"><br>
						Ficha curricular:<br>
				<textarea name="curri" rows=19 cols=70 width:300px height:40px></textarea><br><br>
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
