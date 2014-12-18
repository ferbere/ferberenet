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
		<div id="form-main">
		<form method="post" action="gadgets/quiz/ip_answ.php" enctype="multipart/form-data" name="fvalida">
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
			<div id="maincontent-tit">
				Agregar respuesta a la pregunta
			</div>
				<div id="maincontent-body">
					<div>
						<br><br>Respuesta:<br>
				<input type="text" name="respuesta" size="100%"><br><br>
						<b>Valida:</b><br>
				Cierta:<input type="radio" name="valida" value="1">
				Falsa:<input type="radio" name="valida" value="0" checked><br><br>
						Imagen:<br>
				<input type="file" name="imagen" ><br><br>
						Contenido:<br>
				<textarea name="contenido" rows=19 cols=70 width:300px height:40px></textarea><br><br>
						Pregunta:<br>
					</div>
					<div>
						<select name="ques">
<?php
		while($row=$mysql->fetch_array($sql)){
			echo '<option value="'.$row[0].'">'.$row[1].'</option>';
		}

?>
						</select><br><br>
					</div>
						<div>
							<input type="submit" value="enviar">
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