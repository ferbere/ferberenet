<?php
session_start();
if($_SESSION["privilegioss"]=="ferbere"){
	$link=Conectarse();
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
			<div align="justify">
				<div>
					<form method="post" action="gadgets/gadgets/ip_gadgets.php">
					<h1>Agregar gadget</h1>
				</div>
					<div>
						<input type="hidden" name="cuenta" value="<?php echo $cuenta ?>">
						Gadget:<br><input type="text" name="gadget" size="30"><br>
						Alias:<br><input type="text" name="alias" size="30"><br>
						Ruta:<br><input type="text" name="rutas" size="30"><br>
						Privilegios:<br>
	<?php
	$i=1;
	while($row=mysql_fetch_array($sql)){
		echo '<input type="checkbox" name="privilegios[]" value="'.$i.'">'.$row[0].'  ';
		$i=$i+1;
	}?>
				</div>
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