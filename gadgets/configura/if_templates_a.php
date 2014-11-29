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
		<div id="form-main">
		<form method="post" action="gadgets/configura/ip_templates_a.php" name="fvalida">
			<div id="maincontent-tit">
				Editar hoja de estilo
			</div>
				<div id="maincontent-body">
					<div>
						Página:<br>
				<input type="text" name="pagina" size="80%" value="<?php echo $pagina; ?>"><br>

						Hoja de estilo:<br>
				<input type="text" name="css" size="80%" value="<?php echo $css; ?>"><br>
						Título:<br>
				<input type="text" name="title" size="80%" value="<?php echo $title; ?>"><br>
						Cabezal:<br>
				<input type="text" name="header" size="30" value="<?php echo $header; ?>"><br><br>
						Botonera:<br>
				<input type="text" name="navbar" size="80%" value="<?php echo $navbar; ?>"><br>
						Logotipo:<br>
				<input type="text" name="logo" size="80%" value="<?php echo $logo; ?>"><br>
						Título de contenido:<br>
				<input type="text" name="tit_maincontent" size="80%" value="<?php echo $tit_maincontent; ?>"><br>
						Contenido principal:<br>
				<input type="text" name="maincontent" size="80%" value="<?php echo $maincontent; ?>"><br>
						Objeto principal:<br>
				<input type="text" name="main_object" size="80%" value="<?php echo $main_object; ?>"><br>
						Detalle:<br>
				<input type="text" name="detail" size="80%" value="<?php echo $detail; ?>"><br>
						Pie de página:<br>
				<input type="text" name="footer" size="80%" value="<?php echo $footer; ?>"><br>
				<input type="hidden" name="rubro" value="<?php echo $rubro ?>" size="80%"><br>

				</div>
					<div><h2>banners</h2>
						Banner 1:<br>
				<input type="text" name="bann1" size="80%" value="<?php echo $bann1; ?>"><br>
						Banner 2:<br>
				<input type="text" name="bann2" size="80%" value="<?php echo $bann2; ?>"><br>
						Banner 3:<br>
				<input type="text" name="bann3" size="80%" value="<?php echo $bann3; ?>"><br>
						Banner 4:<br>
				<input type="text" name="bann4" size="80%" value="<?php echo $bann4; ?>"><br>
						Banner 0:<br>
				<input type="text" name="bann0" size="80%" value="<?php echo $bann0; ?>"><br>

					</div>

						<div>
							<input type="submit" value="enviar">
					</form>
						</div>
				</div>
<?php
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
	echo "Usted no tiene acceso a esta seccción";
}
?>