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
		$sql=mysql_query("SELECT content,orden,visible FROM template_complex WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
			$content=$row[0];
			$orden=$row[1];
			$visible=$row[2];
		}
?>
		<div id="form-main">
		<form method="post" action="gadgets/configura/ip_complex_a.php" name="fvalida">
			<input type="hidden" name="rubro" value="<?php echo $rubro; ?>">
			<div id="maincontent-tit">
				Editar hoja de estilo
			</div>
				<div id="maincontent-body">
					<div>
						Contenido:<br>
				<input type="text" name="content" size="80%" value="<?php echo $content; ?>"><br>
<br>
						Orden:<br>
				<input type="number" name="orden" value="<?php echo $orden; ?>"><br>
<br>
			<?php
			if($visible==0){
			$visino="checked";
			$visisi="nain";
			}elseif($visible==1){
			$visino="nain";
			$visisi="checked";
			}
			?>
					<br>visible:<br>
					Sí <input type="radio" name="visible" value="1" size="30" <?php echo $visisi ?>>
					No <input type="radio" name="visible" value="0" size="30" <?php echo $visino ?>>
<br><br>

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