<?php
session_start();
include("library/confirm.php");
include("library/tinymce.php");
if(($_SESSION['privilegioss']=="ferbere")||($_SESSION['privilegioss']=="admin")){
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
		include_once("classes/mysql.php");
		$mysql=new MySQL();	

		if(isset($_GET['rubro'])){
			$rubro=$_GET['rubro'];
		}
		$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
		$url=mysql_fetch_array($sql_u);
		if($url[1]==''){
			$url_d='../'.$_SESSION["admin"].'/images/encuestas/';
		}else{
			$url_d='http://'.$url[1].'/'.$_SESSION['admin'].'/images/encuestas/';
		}
	$sql=$mysql->consulta("SELECT id,pregunta,quiz,imagen,contenido FROM quiz_ques WHERE id = '$rubro' ");
	while($row=$mysql->fetch_array($sql)){
		$id			=	$row[0];
		$pregunta	=	$row[1];
		$quiz		=	$row[2];
		$imagen		=	$row[3];
		$contenido	=	$row[4];
	}
	$sql_q=$mysql->consulta("SELECT id,nombre FROM quiz_index ORDER BY id ASC");
?>
	<form method="post" action="gadgets/quiz/ip_ques_a.php" enctype="multipart/form-data">
 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
	<h1>Modificar pregunta</h1>
	<img src="<?php echo $url_d.$imagen; ?>" height="200px"><br>
	<label>Pregunta</label>
	<input type="text" name="pregunta" value="<?php echo $pregunta ?>">
	<label>Encuesta</label>
	<select name="quiz">
<?php
while($row_q=$mysql->fetch_array($sql_q)){
	if($row_q[0]==$quiz){
		$hig='selected';
	}else{
		$hig='nain';
	}
	echo '<option value="'.$row_q[0].'"'.$hig.'>'.$row_q[1].'</option>';
}

?>
		</select>
		<fieldset>
			<legend>Imagen</legend> 
		<?php
		if(empty($imagen)){?>
			<input type="file" name="imagen"/>
<?php		}else{?>
			<?php echo $imagen; ?>
			<a href="gadgets/encuestas/borra_imagen.php?borra=1&rubro=<?php echo $id; ?>">Borrar y cargar otra imagen</a>
<?php } ?>
		</fieldset>
		<label>Contenido</label>
		<textarea name="contenido"><?php echo $contenido ?></textarea>
		<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
		<input type="submit"  value="enviar"><br><br>
	</form>
<?
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
	echo "Usted no tiene acceso a esta sección";
}
?>