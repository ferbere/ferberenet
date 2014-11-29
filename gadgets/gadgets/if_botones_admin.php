<?php
session_start();
if($_SESSION["privilegioss"]=="ferbere"){
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
<div id="form-main">
	<div>
		<form method="post" action="gadgets/gadgets/ip_botones_admin.php">
		<h1>Agregar Botones al Admin</h1>
	</div>
		<div align="justify" style="height:80px">
			<div style="float:left">
				Botón:<br><input type="text" name="boton" size="30">
			</div>
			<div style="left: 50px; position: relative; float: left;">
				Imagen:<br><input type="text" name="imagen" size="30">
			</div>
				<div style="left: 100px; float: left; position: relative">
					Extensión <br>
					<select name="ext">
						<option value="jpg">.jpg</a>
						<option value="png">.png</a>
					</select>
				</div>
					<div style="clear: both">
					</div>
		</div>
			<div align="justify" style="position: relative">
				<div style="float: left">
					Ruta:<br><input type="text" name="ruta" size="30">
				</div>
					<div style="float: left; position: relative; left: 80px">
						Gadget:<br>
						<select name="gadget">
<?php
$link=Conectarse();	
$sql2=mysql_query("SELECT id,gadget FROM gadgets_index" ,$link);
while ($row2=mysql_fetch_array($sql2)){
	echo '<option value="'.$row2['id'].'">'."\n".$row2['gadget']."</a>   ";
}
?>
						</select>
					</div>
						<div style="left: 100px; float: left; position: relative">
							Privilegios:<br>
							<select name="privilegios">
<?php
$link=Conectarse();	
$sql3=mysql_query("SELECT id,nombre FROM usuario_privilegios" ,$link);
while ($row3=mysql_fetch_array($sql3)){
	echo '<option value="'.$row3['id'].'">'."\n".$row3['nombre']."</a>   ";
}
?>
							</select>

						</div>
					</div>
						<div style="clear: both"><br>
						Visible:<br>
						Sí: <input type="radio" name="visible" value="1" checked>
						No: <input type="radio" name="visible" value="0"><br><br>
						</div>
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