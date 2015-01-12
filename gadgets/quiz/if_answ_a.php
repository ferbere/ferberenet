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
?>
<div id="form-main">
	<form method="post" action="gadgets/quiz/ip_answ_a.php" enctype="multipart/form-data">
 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
	<div id="maincontent-tit">
		Modificar respuesta<br><br>
	</div>
		<div id="maincontent-body">
			<div id="mma">
<?php
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
	
?>
		<img src="../images/encuesta/<?php echo $imagen; ?>"><br><br>
		Respuesta:<br>
		<input type="text" name="respuesta" style="width:400px" value="<?php echo $respuesta ?>"><br>
		Valida:<br>
		Cierta:	<input type="radio" name="valida" value="1" <?php echo $si ?>>
		Falsa:	<input type="radio" name="valida" value="0"  <?php echo $no ?>><br><br>
				<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
			</div>
			<div>
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
		</select><br><br>
<?php
		if(empty($imagen)){?>
			Imagen: 
			<input type="file" name="imagen" ><br><br><br>

<?php		}else{?>
			Imagen: <b><?php echo $imagen; ?></b><br>
			<a href="gadgets/quiz/borra_imagen.php?borra=3&rubro=<?php echo $rubro; ?>">Borrar y cargar otra imagen</a><br><br><br>	
<?php } ?>
			Contenido:<br>
			<textarea name="contenido" rows=19 cols=80 width:300px height:40px><?php echo $contenido ?></textarea>
<br><br>
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
