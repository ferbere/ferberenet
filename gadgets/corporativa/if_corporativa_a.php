<?php
session_start();
include("library/tinymce.php");
include("library/confirm.php");
if(($_SESSION['privilegioss']=="ferbere")||($_SESSION['privilegioss']=="admin")){
if(isset($_GET['capturado'])){
	$capturado=$_GET['capturado'];
}
if(empty($capturado)){
$link=Conectarse();
if(isset($_GET['rubro'])){
	$rubro=$_GET['rubro'];
}
?>
<div id="form-main">
	<div align="justify">
		<div>
<form method="post" action="gadgets/corporativa/ip_corporativa_a.php" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
<?php
$sql= mysql_query("SELECT id,titulo,subtitulo,contenido,publicado,imagen,orden FROM corporativa_index WHERE id = '$rubro' ",$link);
while ($row = mysql_fetch_array($sql)){
	$id					= $row[0];
	$titulo				= $row[1];
	$subtitulo			= $row[2];
	$contenido			= $row[3];
	$publicado			= $row[4];
	$imagen				= $row[5];
	$orden				= $row[6];
}
?>
	<div>
		<img src="../<?php echo $_SESSION['admin']?>/images/corporativa/<?php echo $imagen; ?>" height="200px"><br>

		<h1>Título:<br></h1>
		<input type="text" name="titulo" size="100px" value="<?php echo $titulo ?>" />
	</div><br>
		<div>
			Subtítulo:<br><input type="text" name="subtitulo" size="100px" value="<?php echo $subtitulo ?>" /><br><br>
		</div>
			<div>
		<?php
		if(empty($imagen)){?>
			Imagen: 
			<input type="file" name="imagen" ><br><br><br>

<?php		}else{?>
			Imagen: <b><?php echo $imagen; ?></b><br>
			<a href="gadgets/corporativa/borra_imagen.php?rubro=<?php echo $id; ?>">Borrar y cargar otra imagen</a><br><br><br>	
<?php } ?>			
<br><br>
			</div>
				<div>
					Orden:<input type="text" name="orden" size="5" value="<?php echo $orden?>">
				</div><br><br>
<?php
if($publicado==0){
	$publino="checked";
	$publisi="nain";
}elseif($publicado==1){
	$publino="nain";
	$publisi="checked";
}
?>
	<br><br><div>
Publicado:<br>Sí <input type="radio" name="publicado" value="1" size="30" <?php echo $publisi ?>>
No <input type="radio" name="publicado" value="0" size="30" <?php echo $publino ?>><br><br>
	</div>
		<div style="clear: both">
			Contenido:<br><textarea name="contenido" rows=19 cols=70 width:300px height:40px><?php echo $contenido ?></textarea>
		</div>
				<div>
					<input type="submit"  value="enviar"></form>
					</div>
	</div>
</div>

<?php
}else{
	echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
}
}else{
echo "Usted no tiene acceso a esta sección";
}		
?>
