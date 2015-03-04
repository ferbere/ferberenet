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
		$sql=$mysql->consulta("SELECT id,nombre FROM quiz_index ORDER BY id ASC");
?>
		<form method="post" action="gadgets/quiz/ip_ques.php" enctype="multipart/form-data" name="fvalida">
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
			<h1>Agregar pregunta</h1>
			<label>Pregunta</label>
			<input type="text" name="pregunta">
			<label>Imagen</label>
			<input type="file" name="imagen">
			<label>Contenido</label>
			<textarea name="contenido"></textarea>
			<label>Encuesta</label>
			<select name="quiz">
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