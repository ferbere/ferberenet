<?php
session_start();
include("library/tinymce.php");
include("library/confirm.php");
if(($_SESSION['privilegioss']=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
		$link=Conectarse();
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
	$sql=mysql_query("SELECT id,nombre,imagen,contenido,visible FROM quiz_index WHERE id = '$rubro' ",$link);
	while($row=mysql_fetch_array($sql)){
		$id 	 	= $row[0];
		$nombre  	= $row[1];
		$imagen  	= $row[2];
		$contenido  = $row[3];
		$visible 	= $row[4];

	}
?>
	<form method="post" action="gadgets/quiz/ip_quiz_a.php" enctype="multipart/form-data">
	 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
		<h1>Modificar cuestionario</h1>
		<img src="<?php echo $url_d.$imagen; ?>" height="200px">
		<label>Nombre</label>
		<input type="text" name="nombre" value="<?php echo $nombre ?>">
		<fieldset>
			<legend>Imagen</legend> 
		<?php
		if(empty($imagen)){?>
			<input type="file" name="imagen"/>
<?php		}else{?>
			<?php echo $imagen; ?>
			<a href="gadgets/encuestas/borra_imagen.php?borra=2&rubro=<?php echo $id; ?>">Borrar y cargar otra imagen</a>
<?php } ?>
		</fieldset>
		<label>Contenido</label>
		<textarea name="contenido"><?php echo $contenido ?></textarea>
		<?php
		if($visible==1){
			$vis_si='checked';
			$vis_no='nain';
		}elseif($visible==0){
			$vis_si='nain';
			$vis_no='checked';
			
		}
?>
		<fieldset>
		<legend>Visible</legend>
		<div class="radio">
			<input type="radio" class="not" name="visible" value="1" <?php echo $vis_si ?>>
			<label for="1" class="not2">Sí</label>
			<input type="radio" class="not" name="visible" value="0" <?php echo $vis_no ?>><label for="0" class="not2">No</label>
		</div>
		</fieldset>
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