<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	include_once('classes/conex.php');
	$link=Conectarse();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
			$sql=mysql_query("SELECT * FROM fotos_categoria",$link);
?>
		<div id="form-main">
			<form method="post" action="gadgets/fotos/ip_fotos.php" enctype="multipart/form-data">
		   	 <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
			<div id="maincontent-tit">
				Agregar Foto
			</div>
				<div id="maincontent-body">
					<div>
                        Nombre:<br>
			<input type="text" name="nombre" size="80%"><br><br>
                        Subnombre:<br>
			<input type="text" name="subnombre" size="80%"><br>
						Fecha:<br>
			<input type="date" name="fecha" placeholder="YYYY-MM-DD"><br>							
                        Visible:
			<input type="radio" name="visible" value="0">No  
			<input type="radio" name="visible" value="1" checked>Sí<br><br>
						Categoría:<br>
			<select name="categoria">
<?php
	while ($row=mysql_fetch_array($sql)){
		echo '<option value="'.$row['id'].'">'.$row['nombre'].'</a>';
	}
?>
			</select><br><br>
                        Descripción:<br>
			<textarea name="descripcion" rows=10 cols=80 ></textarea><br><br>
                        Imagen:<br>
			<input type="file" name="imagen">
			<br><br>
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