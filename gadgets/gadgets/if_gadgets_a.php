<?php
session_start();
if($_SESSION["privilegioss"]=="ferbere"){
	$link=Conectarse();
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
	if(empty($capturado)){
		$sql=mysql_query("SELECT * FROM gadgets_index WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
			$gadget=$row['gadget'];
			$ruta=$row['ruta'];
			$visible=$row['visible'];
			$privilegios=$row['privilegios'];
		}
	?>
	<div id="form-main">
		<form method="post" action="gadgets/gadgets/ip_gadgets_a.php">
			<div id="maincontent-tit">
				Modificar Gadget
			</div>
				<div id="maincontent-body">
					<div>
						Gadget:<br><input type="text" name="gadget" size="30" value="<?php echo $gadget; ?>"><br><br>
						Ruta:<br><input type="text" name="ruta" size="60" value="<?php echo $ruta; ?>"><br>
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
						Privilegios: <br>
<?php
$sql_privi=mysql_query("SELECT * FROM usuario_privilegios",$link);
$cuenta_privi=mysql_num_rows($sql_privi);
while($row_privi=mysql_fetch_array($sql_privi)){
	if($row_privi['id']==$privilegios){
		$high='checked';
	}else{
		$high='nain';
	}
?>
						<input type="radio" name="privilegios" value="<?php echo $row_privi['id'] ?>" <?echo $high ?>><?php echo $row_privi['nombre'];
}
?>
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