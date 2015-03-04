<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	include_once("classes/mysql.php");
	$mysql=new MySQL();	
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
		$sql=$mysql->consulta("SELECT id,pregunta FROM quiz_ques ORDER BY id ASC");
?>
		<form method="post" action="gadgets/quiz/ip_answ.php" enctype="multipart/form-data" name="fvalida">
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
		<h1>Agregar respuesta a la pregunta</h1>
		<label>Respuesta</label>
		<input type="text" name="respuesta">
		<fieldset>
			<legend>Válida</legend>
			<div class="radio">
				<input type="radio" class="not" name="valida" value="1">
				<label for ="1" class="not2">Verdadero</label>
				<input type="radio" class="not" name="valida" value="0" checked>
				<label for ="0" class="not2">Falso</label>
			</div>
			</fieldset>
		<label>Imagen</label>
		<input type="file" name="imagen">
		<label>Contenido</label>
		<textarea name="contenido"></textarea>
		<label>Pregunta</label>
		<select name="ques">
<?php
		while($row=$mysql->fetch_array($sql)){
			echo '<option value="'.$row[0].'">'.$row[1].'</option>';
		}

?>
		</select>
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