<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
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
	<form method="post" action="gadgets/menus/ip_botones.php">
	<input type="hidden" name="cuenta" value="<?php echo $cuenta ?>">
	<h1>Agregar Botones al Menú</h1>
	<label>Nombre:</label>
	<input type="text" name="nombre">
	<label>Imagen:</label>
	<input type="text" name="imagen">
	<label>Submenú:</label>
	<select name="submenu">
<?php
	$sql2=$mysql->consulta("SELECT id,nombre FROM menus_submenu");
	while ($row2=$mysql->fetch_array($sql2)){
		echo '<option value="'.$row2['id'].'">'."\n".$row2['nombre']."</a>";
	}
?>
	</select>
	<label>Ruta:</label>
	<input type="text" name="ruta">
	<label>Posición:</label>
	<select name="posicion">
<?php
	$sql2=mysql_query("SELECT id,nombre FROM menus_posicion" ,$link);
	while ($row2=mysql_fetch_array($sql2)){
		echo '<option value="'.$row2['id'].'">'."\n".$row2['nombre']."</a>   ";
	}
?>
	</select>
	<fieldset>
	<legend>Privilegios:</legend>
	<?php
	$i=1;
	while($row=mysql_fetch_array($sql)){
		echo '<input type="checkbox" name="privilegios[]" value="'.$i.'">'.$row[0].'  ';
		$i=$i+1;
	}?>
	</fieldset>
	<fieldset>
	<legend>Visible:</legend>
	<div class="radio">
	<label class="not" for="1">Sí</label>
	<input type="radio" name="visible" value="1" class="not2" checked>
	<label class="not" for="0">No</label>
	<input type="radio" name="visible" value="0" class="not2">
	</div>
	</fieldset>
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