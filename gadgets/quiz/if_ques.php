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
		<div id="form-main">
		<form method="post" action="gadgets/quiz/ip_ques.php" enctype="multipart/form-data" name="fvalida">
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
			<div id="maincontent-tit">
				Agregar pregunta
			</div>
				<div id="maincontent-body">
					<div>
						Pregunta:<br>
				<input type="text" name="pregunta" size="80%"><br><br>
						Imagen:<br>
				<input type="file" name="imagen" ><br><br>
						Contenido:<br>
				<textarea name="contenido" rows=19 cols=70 width:300px height:40px></textarea><br><br>
					</div>
					<div>
						<select name="quiz">
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