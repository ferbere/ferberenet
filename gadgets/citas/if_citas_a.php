<?php
session_start();
include("library/tinymce.php");
include("library/confirm.php");
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
		$link=Conectarse();
		if(isset($_GET['rubro'])){
			$rubro=$_GET['rubro'];
		}
		$sql= mysql_query("SELECT autor,contenido,visible FROM citas_index WHERE id = '$rubro' ",$link);
		while ($row = mysql_fetch_array($sql)){
			$autor		=	$row[0];
			$contenido	=	$row[1];
			$visible	=	$row[2];
		}
?>
	<form method="post" action="gadgets/citas/ip_citas_a.php">
		<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
		<h1>Editar cita</h1>
		<label>Autor</label>
		<input type="text" name="autor" value="<?php echo $autor ?>" />
		<label>Contenido</label>
		<textarea name="contenido"><?php echo $contenido ?></textarea>
					<?php
		if($visible==1){
			$visi_no='nain';
			$visi_si='checked';
		}elseif($visible==0){
			$visi_no='checked';
			$visi_si='nain';

		}
		?>
		<fieldset>
		<legend>Visible</legend>
		<div class="radio">
			<input type="radio" class="not" name="visible" value="1" <?php echo $visi_si ?>>
			<label for="1" class="not2">Sí</label>
			<input type="radio" class="not" name="visible" value="0" <?php echo $visi_no ?>><label for="0" class="not2">No</label>
		</div>
		</fieldset>
		<input type="submit"  value="enviar">
	</form>
<?php
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
echo "Usted no tiene acceso a esta sección";
}		
?>
