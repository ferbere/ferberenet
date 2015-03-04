<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	$link=Conectarse();
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
	if(empty($capturado)){
		$sql=mysql_query("SELECT id,nombre,imagen FROM banners_dir WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
			$id 	=$row[0];
			$nombre =$row[1];
			$imagen =$row[2];
		}
		$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
		$url=mysql_fetch_array($sql_u);
		if($url[1]==''){
			$url_d='../'.$_SESSION["admin"].'/images/banners/';
		}else{
			$url_d='http://'.$url[1].'/'.$_SESSION['admin'].'/images/banners/';
		}
	?>
		<form method="post" action="gadgets/banners/ip_maqueta_a.php" enctype="multipart/form-data">
		 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
			<h1>Modificar maqueta de banners</h1>
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
					<a href="gadgets/banners/borra_imagen.php?borra=2&rubro=<?php echo $rubro; ?>">Borrar y cargar otra imagen</a>
		<?php } ?>			
			</fieldset>
			<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
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