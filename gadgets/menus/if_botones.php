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
	<div id="form-main">
			<div>
				<form method="post" action="gadgets/menus/ip_botones.php">
					<input type="hidden" name="cuenta" value="<?php echo $cuenta ?>">
				<h1>Agregar Botones al Menú</h1>
			</div>
				<div id="a">
					<div id="a1">
						Nombre:<br><input type="text" name="nombre" size="30">
					</div>
					<div id="a2">
						Imagen:<br><input type="text" name="imagen" size="30">
					</div>
					<div id="a3">
						Submenú:<br><select name="submenu">
<?php

	$sql2=$mysql->consulta("SELECT id,nombre FROM menus_submenu");
	while ($row2=$mysql->fetch_array($sql2)){
		echo '<option value="'.$row2['id'].'">'."\n".$row2['nombre']."</a>";
	}
?>
						</select>
					</div>
				</div>
				<div id="b">
					<div id="b1">
							Ruta:<br><input type="text" name="ruta" size="30">
					</div>
					<div id="b2">
						Posición:<br>
						<select name="posicion">
<?php

	$sql2=mysql_query("SELECT id,nombre FROM menus_posicion" ,$link);
	while ($row2=mysql_fetch_array($sql2)){
		echo '<option value="'.$row2['id'].'">'."\n".$row2['nombre']."</a>   ";
	}
?>
						</select>

					</div>
				</div>
				<div id="c">
					<div id="c1">
						Privilegios:<br>
	<?php
	$i=1;
	while($row=mysql_fetch_array($sql)){
		echo '<input type="checkbox" name="privilegios[]" value="'.$i.'">'.$row[0].'  ';
		$i=$i+1;
	}?>

					</div>
				<div id="c2">
					Visible: <br>
					<input type="radio" name="visible" value="1" checked>Sí
					<input type="radio" name="visible" value="0">No
				</div>
			</div>
			<div id="d">
				<div id="c1">
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