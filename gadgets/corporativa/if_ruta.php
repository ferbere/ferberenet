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
		<form method="post" action="gadgets/corporativa/ip_ruta.php">
			<div id="maincontent-tit">
				Agregar ruta
			</div>
				<div id="maincontent-body">
					<div>
						Nombre:<br>
						<input type="text" name="nombre" size="30"><br>
						Imagen:<br>
						<input type="text" name="imagen" size="30">.jpg<br>
					</div>
						<div>
							Pertenece a:<br>
							<select name="belong">
								<option value="0">ninguno</a>
<?php
		$sql=mysql_query("SELECT * FROM gadgets_botones WHERE id = 4 OR id > 5",$link);
		while ($row=mysql_fetch_array($sql)){
			echo '<option value="'.$row['id'].'">'.$row['nombre'].'</a>';
		}
		?>
							</select><br><br>
						</div>
							<div>
								<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
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