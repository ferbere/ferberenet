<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	$link=Conectarse();
	include("../library/tinymce.php");
	include("../library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<div id="form-main">
		<form method="post" action="gadgets/articulos/ip_fotoedicion.php">
			<div id="maincontent-tit">
				Agregar Foto Edición<br><br>
			</div>
				<div id="maincontent-body">
					<div>
						imagen:<br>
						<input type="text" name="imagen" size="80%">.jpg<br>
						Páginas:<br>
						<input type="text" name="paginas" size="80%"><br>
						Edición:<br><select name="edicion">
<?php 
$sql=mysql_query("SELECT id,nombre FROM articulos_ediciones ORDER BY id DESC ",$link);
while($row=mysql_fetch_array($sql)){
	echo '<option value="'.$row[0].'">'.$row[1].'</option>';
}
?>
						</select>
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