<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	$link=Conectarse();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
	if(empty($capturado)){
		$sql=mysql_query("SELECT menus_botones.nombre,menus_botones.imagen,menus_botones.ruta,menus_submenu.nombre,menus_posicion.nombre,usuario_privilegios.id,menus_botones.visible FROM menus_botones INNER JOIN menus_submenu ON menus_botones.submenu = menus_submenu.id INNER JOIN menus_posicion ON menus_botones.posicion = menus_posicion.id INNER JOIN usuario_privilegios ON menus_botones.privilegios = usuario_privilegios.id WHERE menus_botones.id = '$rubro' ",$link);
		$sql_menus=mysql_query("SELECT id,nombre FROM menus_submenu",$link);
		$sql_pos=mysql_query("SELECT id,nombre FROM menus_posicion ORDER BY nombre ASC",$link);
		$sql_pri=mysql_query("SELECT id,nombre FROM usuario_privilegios ORDER BY id ASC",$link);
		while($row=mysql_fetch_array($sql)){
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
					<div>
						Nombre:<br><input type="text" name="nombre" size="30" value="<?php echo $nombre; ?>"><br>
						Imagen:<br><input type="text" name="imagen" size="30" value="<?php echo $imagen; ?>"></div><br>
					<div>Submenú<br>
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
						</select><br><br>
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
						</select><br><br>
						Ruta:<br><input type="text" name="ruta" size="60" value="<?php echo $ruta; ?>"><br><br>
					Privilegios:<br>
					<select name="privilegios">
<?php
while($row_pri = mysql_fetch_array($sql_pri)){
	if($privilegios==$row_pri[0]){
		$pr='selected';
	}else{
		$pr='nain';
	}
					echo '<option value="'.$row_pri[0].'"'.$pr.'>'.$row_pri[1].'</a>';
}
?>
					</select><br><br>
<?php
if($visible==1){
	$higsi='checked';
	$higno='nain';
}elseif	($visible==0){
		$higsi='nain';
		$higno='checked';
	}
?>
					<br>Visible: <br>
						<input type="radio" name="visible" value="1" <?echo $higsi ?>>Sí
						<input type="radio" name="visible" value="0" <?echo $higno ?>>No<br><br>

						<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
					</div>
						<div>
							<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
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