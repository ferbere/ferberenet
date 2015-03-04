<?php
session_start();
include_once("classes/mysql.php");
$mysql=new MySQL();
include("library/tinymce.php");
include("library/confirm.php");
if(($_SESSION['privilegioss']=="ferbere")||($_SESSION['privilegioss']=="admin")){
if(isset($_GET['capturado'])){
$capturado=$_GET['capturado'];
}
if(empty($capturado)){
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
?>
<?php
$sql= $mysql->consulta("SELECT nombre,pregunta,respuesta,categoria,visible FROM faq_index WHERE id = '$rubro' ");
while ($row = $mysql->fetch_array($sql)){
	$nombre=$row[0];
	$pregunta=$row[1];
	$respuesta=$row[2];
	$categoria=$row[3];
	$visible=$row[4];
}
?>
<h1>Edita pregunta frecuente</h1>
<form method="post" action="gadgets/faq/ip_faq_a.php">
	<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
	<label>Título</label>
	<input type="text" name="nombre" value="<?php echo $nombre ?>" />
	<?php echo $material ?>
	<label>Pregunta</label>
	<textarea name="pregunta" ><?php echo $pregunta ?></textarea>
	<label>Respuesta</label>
	<textarea name="respuesta"><?php echo $respuesta ?></textarea>
	<?php
		if($visible==1){
			$vis_si='checked';
			$vis_no='nain';
		}elseif($visible==0){
			$vis_si='nain';
			$vis_no='checked';
			
		}
?>
	Categoría:<br>
	<select name="categoria">
<?php
$sqlCat=mysql_query("SELECT id,nombre FROM faq_categoria ORDER BY id ASC ",$link);
while($rowCat=mysql_fetch_array($sqlCat)){
	if($categoria!=$rowCat['id']){
		$cat= 'nain';
	}else{
		$cat="selected";
	}?>
			<option value="<?php echo $rowCat['id']; ?>"<?php echo $cat;?>>
<?php 			echo $rowCat['nombre'];?>
			</option>
<?php
}
?>
	</select>
	<fieldset>
	<legend>Visible</legend>
	<div class="radio">
		<input type="radio" class="not" name="visible" value="1" <?php echo $vis_si ?>>
		<label for="1" class="not2">Sí</label>
		<input type="radio" class="not" name="visible" value="0" <?php echo $vis_no ?>><label for="0" class="not2">No</label>
	</div>
	</fieldset>
	<input type="submit"  value="enviar">
</form>
<?
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
echo "Usted no tiene acceso a esta sección";
}		
?>