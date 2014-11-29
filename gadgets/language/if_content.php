<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){

	include("../library/tinymce.php");
	include("../library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<div id="form-main">
			<form method="post" action="gadgets/language/ip_content.php">
<?php
			$sql=mysql_query("SELECT id,nombre FROM language_index",$link);
?>
			<div id="maincontent-tit">
				Agrega Contenido Traducido
			</div>
			<div id="maincontent-body">
				<div>
					Título:<br><input type="text" name="titulo" size="80%"><br>
					Subtítulo:<br><input type="text" name="subtitulo" size="80%"><br><br>
					Nombre:<br><input type="text" name="nombre" size="80%"><br><br>
				</div>
					<div style="width:500px; height: 50px">
							Imagen:<br><input type="text" name="imagen" size="30"><br>
					</div>
					<div>
							Idioma:<br><select name="idioma">
				<?php
				while ($row=mysql_fetch_array($sql)){
				echo '<option value="'.$row[0].'">'."\n".$row[1]."</option>";
				}
				?>
								</select><br>
							Vínculo:<br><input type="text" name="vinculo" size="30"><br>
							Sección vinculada:<br><input type="text" name="secc_vincula" size="30"><br><br>
					</div>
				<div>
					Contenido:<br><textarea name="contenido" rows=19 cols=70 width:300px height:40px></textarea><br>
					visible:<br>
					Sí <input type="radio" name="visible" value="1" size="30">
					No <input type="radio" name="visible" value="0" size="30" checked><br><br>
				</div>

							<div>
								<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar"></form>
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