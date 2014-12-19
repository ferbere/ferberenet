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
			$url_d='../'.$_SESSION["admin"].'/images/encuesta/';
		}else{
			$url_d='http://'.$url[1].'/'.$_SESSION['admin'].'/images/encuesta/';
		}
?>
<div id="form-main">
	<form method="post" action="gadgets/quiz/ip_ques_a.php" enctype="multipart/form-data">
 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
	<div id="maincontent-tit">
		Modificar pregunta<br><br>
	</div>
		<div id="maincontent-body">
			<div id="mma">
<?php
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
		<img src="<?php echo $url_d.$imagen; ?>" height="200px"><br>
		Pregunta:<br>
		<input type="text" name="pregunta" style="width:400px" value="<?php echo $pregunta ?>"><br><br>
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
		</select><br><br>
<?php
		if(empty($imagen)){?>
			Imagen: 
			<input type="file" name="imagen" ><br><br><br>

<?php		}else{?>
			Imagen: <b><?php echo $imagen; ?></b><br>
			<a href="gadgets/quiz/borra_imagen.php?borra=2&rubro=<?php echo $rubro; ?>">Borrar y cargar otra imagen</a><br><br><br>	
<?php } ?>
			Contenido:<br>
			<textarea name="contenido" rows=19 cols=80 width:300px height:40px><?php echo $contenido ?></textarea>
		<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
			</div>
				<div>
					<input type="submit"  value="enviar"><br><br>
			</form>
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
