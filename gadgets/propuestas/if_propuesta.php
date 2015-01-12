<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	include_once("classes/mysql.php");
	$mysql=new MySQL();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
		$sql=$mysql->consulta("SELECT id,nombre FROM propuesta_categoria");
?>
		<div id="form-main">
		<form method="post" action="gadgets/propuestas/ip_iniciativa.php">
			<div id="maincontent-tit">
				Agregar Propuesta
			</div>
				<div id="maincontent-body">
					<div>
						Nombre:<br>
						<input type="text" name="nombre" size="112"><br>
						Iniciativa:<br>
						<textarea name="texto" cols="80" rows="20"></textarea><br>
						Categoría<br>
						<select name="categoria">
<?php
	while($row=$mysql->fetch_array($sql)){
		echo '<option value="'.$row[0].'">'.$row[1].'</option>';
	}
?>
						</select><br><br>
                        Visible:
			<input type="radio" name="visible" value="0" checked>No  
			<input type="radio" name="visible" value="1" >Sí<br><br>
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