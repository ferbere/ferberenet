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
<div id="form-main">
	<form method="post" action="gadgets/menus/ip_botones_a.php">
		<div id="maincontent-tit">
			Modificar botones
		</div>
			<div id="maincontent-body">
				<div id="a">
					<div id="a1">
						Nombre:<br><input type="text" name="nombre" size="30" value="<?php echo $nombre; ?>">
					</div>
					<div id="a2">
						Imagen:<br><input type="text" name="imagen" size="30" value="<?php echo $imagen; ?>">
					</div>
					<div id="a3">Submenú<br>
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
					</div>
				</div>
				<div id="b">
					<div id="b1">
						Posicion:<br>
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
					</div>
					<div id="b2">
						Ruta:<br><input type="text" name="ruta" size="60" value="<?php echo $ruta; ?>"><br>
					</div>
				</div>
				<div id="c">
					<div id="c1">
						Privilegios: <br>
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
					</div>
<?php
if($visible==1){
	$higsi='checked';
	$higno='nain';
}elseif	($visible==0){
		$higsi='nain';
		$higno='checked';
	}
?>
					<div id="c2">
						Visible: <br>
						<input type="radio" name="visible" value="1" <?echo $higsi ?>>Sí
						<input type="radio" name="visible" value="0" <?echo $higno ?>>No<br><br>
					</div>
				</div>
				<div id="d">
					<div id="d1">

						<input type="hidden" name="cuenta" value="<?php echo $cuenta ?>">
						<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
						<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
			</form>
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