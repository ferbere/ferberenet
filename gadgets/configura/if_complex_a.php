<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}	
	if(empty($capturado)){
		$link=Conectarse();
		$sql=mysql_query("SELECT content,orden,visible FROM template_complex WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
			$content=$row[0];
			$orden=$row[1];
			$visible=$row[2];
		}
?>
		<form method="post" action="gadgets/configura/ip_complex_a.php" name="fvalida">
			<input type="hidden" name="rubro" value="<?php echo $rubro; ?>">
			<h1>Editar hoja de estilo</h1>
			<label>Contenido</label>
			<input type="text" name="content" size="80%" value="<?php echo $content; ?>">
			<label>Orden</label>
			<input type="number" name="orden" value="<?php echo $orden; ?>">
<?php
if($visible==0){
	$visino="checked";
	$visisi="nain";
}elseif($visible==1){
	$visino="nain";
	$visisi="checked";
}
?>
			<fieldset>
				<legend>visible</legend>
				<div class="radio">
					<label for="0" class="not">No</label>
					<input type="radio" name="visible" value="0" class="not2" <?php echo $visino ?>>
					<label for="1" class="not">Sí</label>
					<input type="radio" name="visible" value="1" class="not2" <?php echo $visisi ?>>
			</fieldset>
			<input type="submit" value="enviar">
		</form>
<?php
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
	echo "Usted no tiene acceso a esta seccción";
}
?>