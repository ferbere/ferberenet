<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	include_once("classes/mysql.php");
	$mysql=new MySQL();
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
			$sql3=$mysql->consulta("SELECT id,nombre FROM usuario_privilegios WHERE id > 2");
	?>
		<form method="post" action="gadgets/descargar/ip_descargar.php" enctype="multipart/form-data">
		   	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
			<h1>Agregar material</h1>
			<fieldset>
				<legend>Imagen:</legend>
				<input type="file" name="imagen" >
			</fieldset>
			<fieldset>
				<legend>Visible</legend>
				<div class="radio">
					<label for="1" class="not">Sí</label>
					<input type="radio" class="not2" name="visible" value="1">
					<label for="0" class="not">No</label>
					<input type="radio" class="not2" name="visible" value="0" checked>
				</div>
			</fieldset>
			<label>Disponible:</label>
			<select name="disponible">
				<?php
				while ($row3=mysql_fetch_array($sql3)){
					echo '<option value="'.$row3['id'].'">'."\n".$row3['nombre']."</a>   ";
				}
				?>
			</select>
			<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
		</form>
	<?php
	}else{
		echo "El contenido ha sido capturado, debidamente. ?Muy bien!";
	}
}else{
	echo "Usted no tiene acceso a esta sección";
}
?>