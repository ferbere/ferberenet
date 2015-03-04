<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	include_once("classes/mysql.php");
	$mysql=new MySQL();
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
	if(empty($capturado)){
		$sql=$mysql->consulta("SELECT menus_botones.nombre,menus_botones.imagen,menus_botones.ruta,menus_submenu.nombre,menus_posicion.nombre,menus_botones.privilegios,menus_botones.visible FROM menus_botones INNER JOIN menus_submenu ON menus_botones.submenu = menus_submenu.id INNER JOIN menus_posicion ON menus_botones.posicion = menus_posicion.id WHERE menus_botones.id = '$rubro' ");
		$sql_menus=$mysql->consulta("SELECT id,nombre FROM menus_submenu");
		$sql_pos=$mysql->consulta("SELECT id,nombre FROM menus_posicion ORDER BY nombre ASC");
		while($row=$mysql->fetch_array($sql)){
			$nombre=$row[0];
			$imagen=$row[1];
			$ruta=$row[2];
			$submenu=$row[3];
			$posicion=$row[4];
			$privilegios=$row[5];
			$visible=$row[6];
		}
	?>

	<form method="post" action="gadgets/menus/ip_botones_a.php">
	<h1>Modificar botones</h1>
	<label>Nombre:</label>
	<input type="text" name="nombre" size="30" value="<?php echo $nombre; ?>">
	<label>Imagen:</label>
	<input type="text" name="imagen" size="30" value="<?php echo $imagen; ?>">
	<label>Submenú</label>
	<select name="submenu">
	<?php
	while($row_menus = mysql_fetch_array($sql_menus)){
		if($submenu==$row_menus[1]){
			$f='selected';
		}else{
			$f='nain';
		}
						echo '<option value="'.$row_menus[0].'"'.$f.'>'.$row_menus[1].'</a>';
	}
	?>
	</select>
	<label>Posicion:</label>
	<select name="posicion">
	<?php
	while($row_pos = mysql_fetch_array($sql_pos)){
		if($posicion==$row_pos[1]){
			$p='selected';
		}else{
			$p='nain';
		}
						echo '<option value="'.$row_pos[0].'"'.$p.'>'.$row_pos[1].'</a>';
	}
	?>
	</select>
	<label>Ruta:</label>
	<input type="text" name="ruta" size="60" value="<?php echo $ruta; ?>">
	<fieldset>
	<legend>Privilegios:</legend>
<?php
$privv= decbin($privilegios);
/*
echo $privilegios.'<br>';
echo $privv.'<br><br>';*/
$sql_privi=$mysql->consulta("SELECT nombre FROM usuario_privilegios ORDER BY id DESC");
$cuenta=$mysql->num_rows($sql_privi);

$privv_def=str_pad($privv,$cuenta,'0',STR_PAD_LEFT);

$h=$cuenta;
$j=1;
while($row_privi=$mysql->fetch_array($sql_privi)){
	if($privv_def{$j-1}==1){
		$high='checked';
	}else{
		$high='nain';
	}
	echo '<input type="checkbox" name="privilegios[]" value="'.$j.'"'.$high.'>'.$row_privi[0].'  ';
	$h=$h-1;
	$j=$j+1;
}
?>
	</fieldset>
	<fieldset>
		<div id="radio">
	<legend>Visible:</legend>
<?php
if($visible==1){
	$higsi='checked';
	$higno='nain';
}elseif	($visible==0){
		$higsi='nain';
		$higno='checked';
	}
?>
	<input type="radio" class="not" name="visible" value="1" <?echo $higsi ?>>
	<label class="not2" for="1" >Sí</label>
	<input type="radio" class="not" name="visible" value="0" <?echo $higno ?>>
	<label class="not2" for="0" >No</label>
</div>
	</fieldset>
	<input type="hidden" name="cuenta" value="<?php echo $cuenta ?>">
	<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
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