<?php
session_start();
include_once('classes/conex.php');
$link=Conectarse();

if(($_SESSION['privilegioss']=="ferbere")||($_SESSION['privilegioss']=="admin")){
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<div id="form-main">
		<form method="post" action="gadgets/agenda/ip_evento.php" name="fvalida">
		<div id="maincontent-tit">
				Crear evento del Candidato
			</div>
				<div id="maincontent-body">
					<div id="a" style="margin-left:0px;padding-left:30px;width:60%;">
						Titulo:<br>
						<input type="text" name="titulo"><br>
						Subtitulo:<br>
				<input type="text" name="subtitulo"><br>
					</div>
					<div id="b">
						<div id="b1">
						Imparte:<br>
				<input type="text" name="imparte">
						</div>
						<div id="b2">
						Dirigido a:<br>
				<select name="dirigido">
					<option value="0">general</a>
					</select><br><br>
						Tipo:<br>
						<select name="tipo">
						<option value="0">Conferencia</a>
						<option value="1">Logístico</a>
						<option value="2">Act. académica</a>
							</select>
						</div>
						<div id="c">
							<div id="c1">
						Descripción:<br>
				<textarea name="descripcion"></textarea>
							</div>
							<div id="c2">
						Lugar:<br>
							<select name="lugar">
								<option value="0">Indefinido</a>
							</select><br><br>
						Programado para el día:<br>
				<select name="dia">
					<option value="0">No programado</a>
<?php
$sql_dia=mysql_query("SELECT id,fecha FROM agenda_dia", $link);
while($row_dia=mysql_fetch_array($sql_dia)){
	echo '<option value="'.$row_dia[0].'">'.$row_dia[1].'</a>';
}
?>
					
				</select>
							</div>
						</div>
						<div id="d">
							<div id="d1">
						Hora inicio:<br>
				<input type="text" name="hora_i">
							</div>
							<div id="d2">
						Hora término:<br>
				<input type="text" name="hora_t">
							</div>
					</div>
					<div id="e">
						<div id="e1">
							<input type="submit" value="enviar">
					</form>
						</div>
				</div>
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
