<?php
session_start();
include("library/tinymce.php");
include("library/confirm.php");
if(($_SESSION['privilegioss']=="ferbere")||($_SESSION['privilegioss']=="admin")){
if(isset($_GET['capturado'])){
$capturado=$_GET['capturado'];
}
if(empty($capturado)){
$link=Conectarse();
if(isset($_GET['rubro'])){
$rubro=$_GET['rubro'];
}
?>
<div id="form-main" style="margin:0px auto; border:0px solid">
	<div>
		<div>
<form method="get" action="faq.php">
<input type="hidden" name="ruta" value="ip_faq_a.php">
<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
<?php
$sql= mysql_query("SELECT titulo,pregunta,respuesta,categoria FROM faq_index WHERE id = '$rubro' ",$link);
while ($row = mysql_fetch_array($sql)){
	$titulo=$row[0];
	$pregunta=$row[1];
	$respuesta=$row[2];
	$categoria=$row[3];
}
?>
	<div>
		<h1>Título:<br></h1>
		<input type="text" name="titulo" size="100px" value="<?php echo $titulo ?>" /><?php echo $material ?>
<br><br>
			Pregunta:<br><textarea name="pregunta" rows=19 cols=70 width:300px height:40px><?php echo $pregunta ?></textarea>
<br><br>
			Respuesta:<br><textarea name="respuesta" rows=19 cols=70 width:300px height:40px><?php echo $respuesta ?></textarea>
<br><br>
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
			</select><br><br>
			<input type="submit"  value="enviar"></form>
		</div>
	</div>
</div>
<?
}else{
	echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
}
}else{
echo "Usted no tiene acceso a esta sección";
}		
?>