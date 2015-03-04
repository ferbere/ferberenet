<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
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
		$sql=mysql_query("SELECT id,nombre,imagen,belong FROM articulos_categoria WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
			$id=$row[0];
			$nombre=$row[1];
			$imagen=$row[2];
			$belong=$row[3];
		}
		$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
		$url=mysql_fetch_array($sql_u);
		if($url[1]==''){
			$url_d='../'.$_SESSION["admin"].'/images/articulos/';
		}else{
			$url_d='http://'.$url[1].'/'.$_SESSION['admin'].'/images/articulos/';
		}
?>
		<form method="post" action="gadgets/articulos/ip_categoria_a.php" enctype="multipart/form-data">
		 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
			<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
			<h1>Modificar categoría</h1>
			<img src="<?php echo $url_d.$imagen; ?>" height="200px"><br>
			<label>Nombre</label>
			<input type="text" name="nombre" value="<?php echo $nombre; ?>">
			<fieldset>
				<legend>Imagen</legend>
		<?php
				if(empty($imagen)){?>
					<input type="file" name="imagen">

		<?php		}else{?>
				<?php echo $imagen; ?>
					<a href="gadgets/articulos/borra_imagen.php?borra=2&rubro=<?php echo $rubro; ?>">Borrar y cargar otra imagen</a>
		<?php } ?>			
			</fieldset>
			<input type="hidden" name="rubro" value="<?php echo $rubro ?>"><br><br>
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