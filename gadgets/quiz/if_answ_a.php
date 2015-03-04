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
	$sql=mysql_query("SELECT id,respuesta,valida,ques,imagen,contenido FROM quiz_answ WHERE id = '$rubro' ",$link);
	while($row=mysql_fetch_array($sql)){
		$id 		=	$row[0];
		$respuesta	=	$row[1];
		$valida		=	$row[2];
		$ques		=	$row[3];
		$imagen  	= 	$row[4];
		$contenido  = 	$row[5];
		if($row[2]==0){
			$si='nain';
			$no='checked';
		}else{
			$si='checked';
			$no='nain';			
		}
	}
	$sql_q=$mysql->consulta("SELECT id,pregunta FROM quiz_ques ORDER BY id ASC");
			$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
		$url=mysql_fetch_array($sql_u);
		if($url[1]==''){
			$url_d='../'.$_SESSION["admin"].'/images/encuestas/';
		}else{
			$url_d='http://'.$url[1].'/'.$_SESSION['admin'].'/images/encuestas/';
		}
?>
	<form method="post" action="gadgets/quiz/ip_answ_a.php" enctype="multipart/form-data">
	 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
	 	<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
		<h1>Modificar respuesta</h1>
		<img src="<?php echo $url_d.$imagen; ?>" width="150px">
		<label>Respuesta</label>
		<input type="text" name="respuesta" value="<?php echo $respuesta ?>">
		<fieldset>
		<legend>Válida</legend>
		<div class="radio">
			<input type="radio" class="not" name="valida" value="1" <?php echo $si ?>>
			<label for="1" class="not2">Verdadero</label>
			<input type="radio" class="not" name="valida" value="0" <?php echo $no ?>>
			<label for="0" class="not2">Falso</label>
		</div>
		</fieldset>
		<label>Pregunta</label>
		<select name="ques">
	<?php
	while($row_q=$mysql->fetch_array($sql_q)){
		if($row_q[0]==$ques){
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
			<a href="gadgets/fotos/borra_imagen.php?borra=3&rubro=<?php echo $id; ?>">Borrar y cargar otra imagen</a>
<?php } ?>
		</fieldset>
		<label>Contenido</label>
		<textarea name="contenido"><?php echo $contenido ?></textarea>
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
