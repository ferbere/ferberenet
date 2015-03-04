<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}	
	if(empty($capturado)){
		$link=Conectarse();
		$sql=mysql_query("SELECT * FROM template_index WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
			$pagina=$row['pagina'];
			$css=$row['css'];
			$title=$row['title'];
			$css=$row['css'];
			$header=$row['header'];
			$navbar=$row['navbar'];
			$logo=$row['logo'];
			$tit_maincontent=$row['tit_maincontent'];
			$maincontent=$row['maincontent'];
			$main_object=$row['main_object'];
			$detail=$row['detail'];
			$footer=$row['footer'];
			$bann1=$row['bann1'];
			$bann2=$row['bann2'];
			$bann3=$row['bann3'];
			$bann4=$row['bann4'];
			$bann0=$row['bann0'];
		}
?>
		<form method="post" action="gadgets/configura/ip_templates_a.php" name="fvalida">
		<h1>Editar hoja de estilo</h1>
		<label>Página</label>
		<input type="text" name="pagina" value="<?php echo $pagina; ?>">
		<label>Hoja de estilo</label>
		<input type="text" name="css" value="<?php echo $css; ?>">
		<label>Título</label>
		<input type="text" name="title" value="<?php echo $title; ?>">
		<label>Cabezal</label>
		<input type="text" name="header" size="30" value="<?php echo $header; ?>">
		<label>Botonera</label>
		<input type="text" name="navbar" value="<?php echo $navbar; ?>">
		<label>Logotipo</label>
		<input type="text" name="logo" value="<?php echo $logo; ?>">
		<label>Título de contenido</label>
		<input type="text" name="tit_maincontent" value="<?php echo $tit_maincontent; ?>">
		<label>Contenido principal</label>
		<input type="text" name="maincontent" value="<?php echo $maincontent; ?>">
		<label>Objeto principal</label>
		<input type="text" name="main_object" value="<?php echo $main_object; ?>">
		<label>Detalle</label>
		<input type="text" name="detail" value="<?php echo $detail; ?>">
		<label>Pie de página</label>
		<input type="text" name="footer" value="<?php echo $footer; ?>">
		<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
		<h2>banners</h2>
		<label>Banner 1</label>
		<input type="text" name="bann1" value="<?php echo $bann1; ?>">
		<label>Banner 2</label>
		<input type="text" name="bann2" value="<?php echo $bann2; ?>">
		<label>Banner 3</label>
		<input type="text" name="bann3" value="<?php echo $bann3; ?>">
		<label>Banner 4</label>
		<input type="text" name="bann4" value="<?php echo $bann4; ?>">
		<label>Banner 0</label>
		<input type="text" name="bann0" value="<?php echo $bann0; ?>">
		<input type="submit" value="enviar">
		</form>
<?php
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
	echo "Usted no tiene acceso a esta seccción";
}
?>