<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
include("library/tinymce.php");
include("library/confirm.php");
if(isset($_GET['capturado'])){
$capturado=$_GET['capturado'];
}
if(empty($capturado)){
$link=Conectarse();	
?>
	<div id="form-main">
			<div>
				<form method="post" action="gadgets/menus/ip_botones.php">
				<h1>Agregar Botones al Menú</h1>
			</div>
				<div align="justify" style="height:80px">
					<div style="float:left">
						Nombre:<br><input type="text" name="nombre" size="30">
					</div>
					<div style="float: left; position: relative; left: 50px">
						Imagen:<br><input type="text" name="imagen" size="30">
					</div>
					<div style="float: left; position: relative; left: 80px">
						Submenú:<br><select name="submenu">
<?php

	$sql=mysql_query("SELECT id,nombre FROM menus_submenu",$link);
	while ($row=mysql_fetch_array($sql)){
		echo '<option value="'.$row['id'].'">'."\n".$row['nombre']."</a>";
	}
?>
						</select>
					</div>
				</div>
				<div>
					<div style="float: left; position: relative">
							Ruta:<br><input type="text" name="ruta" size="30">
					</div>
					<div style="float: left; position: relative; left: 50px">
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
					<div style="float: left; position: relative; left: 80px">
						Privilegios:<br>
						<select name="privilegios">
	<?php

		$sql3=mysql_query("SELECT id,nombre FROM usuario_privilegios" ,$link);
		while ($row3=mysql_fetch_array($sql3)){
			echo '<option value="'.$row3['id'].'">'."\n".$row3['nombre']."</a>   ";
		}
	?>
						</select>
					</div>
				</div>
				<div style="clear: both">
					<br>Visible: <br>
					<input type="radio" name="visible" value="1" checked>Sí
					<input type="radio" name="visible" value="0">No<br><br>
					<div>
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