<?php
session_start();
if($_SESSION["privilegioss"]=="ferbere"){
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
		$sql=$mysql->consulta("SELECT id,gadget,alias,ruta,visible,privilegios FROM gadgets_index WHERE id = '$rubro' ");
		while($row=$mysql->fetch_array($sql)){
			$id=$row[0];
			$gadget=$row[1];
			$alias=$row[2];
			$ruta=$row[3];
			$visible=$row[4];
			$privilegios=$row[5];
		}
	?>
	<div id="form-main">
		<form method="post" action="gadgets/gadgets/ip_gadgets_a.php">
			<div id="maincontent-tit">
				Modificar Gadget
			</div>
				<div id="maincontent-body" style="width:100%">
					<div>
						Gadget:<br><input type="text" name="gadget" size="30" value="<?php echo $gadget; ?>"><br><br>
						Alias:<br><input type="text" name="alias" size="30" value="<?php echo $alias; ?>"><br><br>
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
$privv= decbin($privilegios);
/*
echo $privilegios.'<br>';
echo $privv.'<br><br>';*/
$sql_privi=$mysql->consulta("SELECT nombre FROM usuario_privilegios ORDER BY id DESC");
$cuenta=$mysql->num_rows($sql_privi);

$privv_def=str_pad($privv,$cuenta,'0',STR_PAD_LEFT);

echo '<br>';
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
						<input type="hidden" name="cuenta" value="<?php echo $cuenta ?>">
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