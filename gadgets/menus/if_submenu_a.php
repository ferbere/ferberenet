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
		$sql=mysql_query("SELECT id,nombre FROM menus_submenu WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
			$id		 =	$row[0];
			$nombre	=	$row[1];
		}
	?>
		<form method="post" action="ip_submenu_a.php">
		<h1>Modificar Submenú</h1>
		<label>Nombre:</label>
		<input type="text" name="nombre" value="<?php echo $nombre; ?>"><br>
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