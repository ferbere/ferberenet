<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	$link=Conectarse();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<div id="form-main">

			<div id="form-main">
				<form method="post" action="gadgets/banners/ip_banner.php" enctype="multipart/form-data">
			   	 <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
			<div id="maincontent-tit">
				Agregar banner
			</div>
				<div id="maincontent-body">
					<div>
							Nombre:<br>
			<input type="text" name="nombre" size="50"><br>
							Orientación:<br>
			<select name="orientacion">
<?php
	$sql_orie=mysql_query("SELECT id,nombre FROM general_orientacion",$link);
	while ($row_orie=mysql_fetch_array($sql_orie)){
			echo '<option value="'.$row_orie['id'].'">'.$row_orie['nombre'].'</a><br>';
	}
?>
			</select>
				<br><br>

			<textarea name="contenido" rows=19 cols=70 width:300px height:40px></textarea><br>
							Imagen:<br>
			<input type="file" name="imagen" ><br><br>
							Banner:<br>
			<select name="banner">
<?php
	$sql_bann=mysql_query("SELECT id,nombre FROM banners_dir",$link);
	while ($row_bann=mysql_fetch_array($sql_bann)){
			echo '<option value="'.$row_bann['id'].'">'.$row_bann['nombre'].'</a><br>';
	}
?>
			</select>
				<br><br>Liga:<br>
				<input type="text" name="liga" size="100"><br><br>
							Visible:
			<input type="radio" name="visible" value="0" checked>No  
			<input type="radio" name="visible" value="1">Sí  <br>
						</div>
							<div>
			<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
			</form>
							</div>
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