<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
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
		$sql=mysql_query("SELECT nombre,imagen,belong FROM fotos_categoria WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
			$nombre=$row['nombre'];
			$imagen=$row['imagen'];
			$belong=$row['belong'];
		}
		$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
		$url=mysql_fetch_array($sql_u);
		if($url[1]==''){
			$url_d='../'.$_SESSION["admin"].'/images/fotos/';
		}else{
			$url_d='http://'.$url[1].'/'.$_SESSION['admin'].'/images/fotos/';
		}
	?>
		<form method="post" action="gadgets/fotos/ip_categoria_a.php" enctype="multipart/form-data">
		 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
			<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
			<h1>Modificar categoría</h1>
			<img src="<?php echo $url_d.$imagen; ?>" height="200px"><br>
			<?php echo $imagen; ?>
			<label>Nombre</label>
			<input type="text" name="nombre" value="<?php echo $nombre; ?>">
			<fieldset>
			<legend>Imagen</legend> 
		<?php
		if(empty($imagen)){?>
			<input type="file" name="imagen"/>
<?php		}else{?>
			<?php echo $imagen; ?>
			<a href="gadgets/fotos/borra_imagen.php?rubro=<?php echo $id; ?>">Borrar y cargar otra imagen</a>
<?php } ?>
		</fieldset>
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