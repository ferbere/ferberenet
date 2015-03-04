<?php
session_start();
if($_SESSION["privilegioss"]=="ferbere"){
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
	include_once("classes/mysql.php");
	$mysql=new MySQL();
	$sql=$mysql->consulta("SELECT nombre FROM usuario_privilegios ORDER BY id DESC");
	$cuenta=$mysql->num_rows($sql);
?>
		<form method="post" action="gadgets/gadgets/ip_botones_admin.php">
			<input type="hidden" name="cuenta" value="<?php echo $cuenta ?>">
			<h1>Agregar Botones al Admin</h1>
			<label>Botón:</label>
			<input type="text" name="boton" size="30">
			<label>Imagen:</label>
			<input type="text" name="imagen" size="30">
			<label>Extensión</label>
			<select name="ext">
				<option value="jpg">.jpg</a>
				<option value="png">.png</a>
			</select>
			<label>Ruta:</label>
			<input type="text" name="ruta" size="30">
			<label>Gadget:</label>
			<select name="gadget">
<?php
$sql2=$mysql->consulta("SELECT id,gadget FROM gadgets_index");
while ($row2=$mysql->fetch_array($sql2)){
	echo '<option value="'.$row2['id'].'">'.$row2['gadget'].'</option>';
}
?>
			</select>
<fieldset>
	<legend>Visible:</legend>
	<div class="radio">
		<label class="not" for="1">Sí</label>
		<input type="radio" name="visible" value="1" class="not2">
		<label class="not" for="0">No</label>
		<input type="radio" name="visible" value="0" class="not2" checked>
	</div>
</fieldset><br><br>
<fieldset>
	<legend>Privilegios:</legend>
	<?php
	$i=1;
	while($row=$mysql->fetch_array($sql)){
		echo '<input type="checkbox" name="privilegios[]" value="'.$i.'"/>';
		echo $row[0];
		$i=$i+1;
	}?>
</fieldset><br><br>
		<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
		</form>
	<?php
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
	echo "Usted no tiene acceso a esta seccción";
}
?>