<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	include_once('classes/conex.php');
	$link=Conectarse();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
	if(empty($capturado)){

		$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
		$url=mysql_fetch_array($sql_u);
		if($url[1]==''){
			$url_d='../'.$_SESSION["admin"].'/images/testimonios/';
		}else{
			$url_d='http://'.$url[1].'/'.$_SESSION['admin'].'/images/testimonios/';
		}

$sql= mysql_query("SELECT id,titulo,subtitulo,contenido,fecha,orden,imagen,visible FROM testimonios_index WHERE id = '$rubro' ",$link);
while ($row = mysql_fetch_array($sql)){
	$id=$row[0]; 
	$titulo=$row[1];
	$subtitulo=$row[2];
	$contenido=$row[3];
	$fecha=$row[4];
	$orden=$row[5];
	$imagen=$row[6];
	$visible=$row[7];
}
?>
	<div id="form-main">
	<form method="post" action="gadgets/testimonios/ip_testimonios_a.php" enctype="multipart/form-data">
 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
	<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
	<h1>Modificar testimonio</h1>
	<img src="<?php echo $url_d.$imagen; ?>" height="200px"><br>
	<label>Título</label>
	<input type="text" name="titulo" value="<?php echo $titulo ?>"/>
	<label>Subtítulo</label>
	<input type="text" name="subtitulo" value="<?php echo $subtitulo ?>"/>
	<fieldset>
		<legend>Imagen</legend>
<?php
		if(empty($imagen)){?>
			<input type="file" name="imagen" >
<?php		}else{?>
			<?php echo $imagen; ?>
			<a href="gadgets/testimonios/borra_imagen.php?rubro=<?php echo $rubro; ?>">Borrar y cargar otra imagen</a>
<?php } ?>
	</fieldset>

<?php
if($visible==0){
	$publino="checked";
	$publisi="nain";
}elseif($visible==1){
	$publino="nain";
	$publisi="checked";
}
?>
		<fieldset>
				<legend>Visible</legend>
			<div id="radio">
				<label for="1" class="not">Sí</label>
				<input type="radio" name="visible" value="1" class="not2" <?php echo $publisi ?>>
				<label for="0" class="not">No <input type="radio" name="visible" value="0" class="not2" <?php echo $publino ?>>
			</div>
		</fieldset>
		<label>Contenido</label>
		<textarea name="contenido"><?php echo $contenido; ?></textarea>
		<label>Orden</label>
		<input type="number" name="orden" value="<?php echo $orden ?>"/>
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
