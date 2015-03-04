<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")||($_SESSION["privilegioss"]=="directivo")){
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
		$sql= mysql_query("SELECT id,nombre,nombramiento,perfil,imagen,maill,celular,visible,categoria FROM usuario_index WHERE id = '$rubro' ",$link);
        while ($row = mysql_fetch_array($sql)){
			$id				= $row[0];
			$nombre			= $row[1];
			$nombramiento	= $row[2];
			$perfil			= $row[3];
			$imagen			= $row[4];
			$maill			= $row[5];
			$celular		= $row[6];
			$visible		= $row[7];
			$categoria		= $row[8];
		}
		$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
		$url=mysql_fetch_array($sql_u);
		if($url[1]==''){
			$url_d='../'.$_SESSION["admin"].'/images/perfil/';
		}else{
			$url_d='http://'.$url[1].'/'.$_SESSION['admin'].'/images/perfil/';
		}
?>
		<form method="post" action="gadgets/usuario/ip_perfil_a.php" enctype="multipart/form-data">
	 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
		<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
		<h1>Modificar perfil</h1>
		<img src="<?php echo $url_d.$imagen; ?>" height="200px"><br>
		<label>Nombre</label>
		<input type="text" name="nombre" value="<?php echo $nombre ?>">
		<label>Nombramiento</label>
		<input type="text" name="nombramiento" value="<?php echo $nombramiento ?>">
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
		<legend>Imagen</legend>
<?php
		if(empty($imagen)){?>
			<input type="file" name="imagen">

<?php		}else{?>
		<?php echo $imagen; ?>
			<a href="gadgets/usuario/borra_imagen.php?rubro=<?php echo $rubro; ?>">Borrar y cargar otra imagen</a>
<?php } ?>			
	</fieldset>
	<label>Categoría</label>
	<select name="categoria">
<?php
$sqlCat=mysql_query("SELECT id,nombre FROM usuario_categoria ORDER BY id ASC ",$link);
while($rowCat=mysql_fetch_array($sqlCat)){
if($categoria!=$rowCat[0]){
	$cat= 'nain';
}else{
	$cat="selected";
}?>
	<option value="<?php echo $rowCat['id']; ?>"<?php echo $cat;?>>
		<?php echo $rowCat['nombre'];?>
	</option>
<?php }
?>
	</select>
	<label>Perfil</label>
	<textarea name="perfil"><?php echo $perfil ?></textarea>
	<label>e-mail</label>
	<input type="text" name="maill" value="<?php echo $maill ?>">
	<label>Celular</label>
	<input type="text" name="celular" value="<?php echo $celular ?>">
	<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
</form>
<?php
    }else{
	    echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
    }
}else{
	echo "Usted no tiene acceso a esta seccción";
}
?>