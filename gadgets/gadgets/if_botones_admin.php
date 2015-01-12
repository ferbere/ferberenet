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
<div id="form-main">
	<div>
		<form method="post" action="gadgets/gadgets/ip_botones_admin.php">
			<input type="hidden" name="cuenta" value="<?php echo $cuenta ?>">
		<h1>Agregar Botones al Admin</h1>
	</div>
		<div id="b">
			<div id="b1">
				Botón:<br><input type="text" name="boton" size="30">
			</div>
			<div id="b2">
				Imagen:<br><input type="text" name="imagen" size="30">
			</div>
				<div id="b1">
					Extensión <br>
					<select name="ext">
						<option value="jpg">.jpg</a>
						<option value="png">.png</a>
					</select>
				</div>
		</div>
			<div id="c">
				<div id="c1">
					Ruta:<br><input type="text" name="ruta" size="30">
				</div>
					<div id="c2">
						Gadget:<br>
						<select name="gadget">
<?php
$sql2=$mysql->consulta("SELECT id,gadget FROM gadgets_index");
while ($row2=$mysql->fetch_array($sql2)){
	echo '<option value="'.$row2['id'].'">'."\n".$row2['gadget']."</a>   ";
}
?>
						</select>
					</div>
						<div id="c3"><br>
						Visible:<br>
						Sí: <input type="radio" name="visible" value="1" checked>
						No: <input type="radio" name="visible" value="0"><br><br>
						</div>
					<div id="d">
						Privilegios:<br>
	<?php
	$i=1;
	while($row=$mysql->fetch_array($sql)){
		echo '<input type="checkbox" name="privilegios[]" value="'.$i.'">'.$row[0].'  ';
		$i=$i+1;
	}?>
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