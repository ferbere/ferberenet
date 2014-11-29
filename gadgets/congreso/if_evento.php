<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();

if($_SESSION["estado"]=="Autenticado"){
	include("../library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<div id="form-main">
		<form method="post" action="gadgets/congreso/ip_evento.php" name="fvalida">
			<div id="maincontent-tit">
				Crear evento en el Congreso
			</div>
				<div id="maincontent-body">
					<div>
						Tema:<br>
						<textarea name="tema" rows=10 cols=70 width:300px height:40px></textarea><br>
						Subtema:<br>
				<input type="text" name="subtema" size="80%"><br>
						Imparte:<br>
				<input type="text" name="imparte" size="80%"><br>
						Dirigido a:<br>
				<select name="dirigido">
					<option value="0">general</a>
					</select><br><br>
						Tipo:<br>
						<select name="tipo">
						<option value="0">Conferencia</a>
						<option value="1">Logístico</a>
						<option value="2">Act. académica</a>
							</select><br><br>
						Descripción:<br>
				<textarea name="descripcion" rows=19 cols=70 width:300px height:40px></textarea><br><br>
						Lugar:<br>
							<select name="lugar">
								<option value="0">Indefinido</a>
							</select><br><br>
						Programado para el día:<br>
				<select name="dia">
					<option value="0">No programado</a>
<?php
$sql_dia=mysql_query("SELECT id,nombre FROM congreso_dia", $link);
while($row_dia=mysql_fetch_array($sql_dia)){
	echo '<option value="'.$row_dia['id'].'">'.$row_dia['nombre'].'</a>';
}
?>
					
				</select><br><br>
						Hora inicio:<br>
				<input type="text" name="hora_i" size="80%"><br>
						Hora término:<br>
				<input type="text" name="hora_t" size="80%" ><br>
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