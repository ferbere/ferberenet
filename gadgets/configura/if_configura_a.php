<?php
session_start();
include("library/confirm.php");
if($_SESSION['privilegioss']=="ferbere"){
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
		$link=Conectarse();
		if(isset($_GET['rubro'])){
			$rubro=$_GET['rubro'];
		}
?>
		<form method="post" action="gadgets/configura/ip_configura_a.php">
		<h1>Configuración General</h1>
<?php
	$sql=mysql_query("SELECT id,titulo,subtitulo,correo1,metatags,dia,noche,url,pagina FROM template_general",$link);
	while($row=mysql_fetch_array($sql)){
		$id			= $row[0];
		$titulo		= $row[1];
		$subtitulo 	= $row[2];
		$correo1 	= $row[3];
		$metatags 	= $row[4];
		$dia 		= $row[5];
		$noche 		= $row[6];
		$url 		= $row[7];
		$pagina		= $row[8];
	}
?>
		<label>Título de la página</label>
		<input type="text" name="titulo" value="<?php echo $titulo ?>">
		<label>Subtitulo de la página</label>
		<input type="text" name="subtitulo" value="<?php echo $subtitulo ?>">
		<label>Página</label>
		<input type="text" name="pagina" value="<?php echo $pagina ?>">
		<label>Url</label>
		<input type="text" name="url" value="<?php echo $url ?>">
		<label>Inicio día en la página</label>
		<input type="text" name="dia" value="<?php echo $dia ?>">
		<label>Inicio noche en la página</label>
		<input type="text" name="noche" value="<?php echo $noche ?>">
		<label>Correo</label>
		<input type="text" name="correo1" value="<?php echo $correo1 ?>">
		<label>Palabras Clave</label>
		<textarea name="metatags"><?php echo $metatags; ?></textarea>
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
