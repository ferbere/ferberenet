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
	mysql_query('set @numero=0');
	$sql=$mysql->consulta("SELECT @numero:=@numero+1,nombre FROM usuario_privilegios ORDER BY id DESC");
	$cuenta=$mysql->num_rows($sql);
	?>
		<form method="post" action="gadgets/gadgets/ip_gadgets.php">
			<h1>Agregar gadget</h1>
			<input type="hidden" name="cuenta" value="<?php echo $cuenta ?>">
			<label>Gadget:</label>
			<input type="text" name="gadget">
			<label>Alias:</label>
			<input type="text" name="alias">
			<label>Ruta:</label>
			<input type="text" name="rutas">
			<fieldset>
			<legend>Privilegios:</legend>
	<?php
	while($row=mysql_fetch_array($sql)){
		echo '<input type="checkbox" name="privilegios[]" value="'.$row[0].'">'.$row[1].'  ';
	}?>
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