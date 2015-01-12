<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){

	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
<div id="form-main">
	<form method="post" action="gadgets/articulos/ip_articulos.php" enctype="multipart/form-data">
   	 <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
			<?php
			$sql=mysql_query("SELECT id,nombre FROM articulos_categoria",$link);
			$sql2=mysql_query("SELECT id,nombre FROM perfil_index" ,$link);
			?>
			<div id="maincontent-tit">
				Artículo nuevo
			</div>
			<div id="maincontent-body">
				<div>
					Título:<br><input type="text" name="titulo" size="80%"><br>
					Subtítulo:<br><input type="text" name="subtitulo" size="80%"><br><br>
				</div>
					<div style="width:500px; height: 50px">
						<div style="float: left; position: relative">
							Sección:<br><select name="categoria">
			<?php
			while ($row=mysql_fetch_array($sql)){
			echo '<option value="'.$row['id'].'">'."\n".$row['nombre']."</a>   ";
			}
			?>
							</select>
						</div>
							<div style="float: left; position: relative; left: 50px">
								Imagen:<br>
								<input type="file" name="imagen" ><br>
							</div>
					</div>
					<div>
					</div>
				<div>
					Contenido:<br><textarea name="contenido" rows=19 cols=70 width:300px height:40px></textarea><br>
				</div>
					<div style="width:500px; height: 50px">
						<div style="float: left">
<?php
	if(($_SESSION['privilegioss']=='ferbere')OR($_SESSION['privilegioss']=='admin')){
?>
							Publicado:<br>
							Sí <input type="radio" name="publicado" value="1" size="30">
							No <input type="radio" name="publicado" value="0" size="30" checked>
<?php } ?>
						</div>
							<div style="float: left; position: relative; left: 50px">
							Autor:<br><select name="autor">
			<?php
			while ($row2=mysql_fetch_array($sql2)){
			echo '<option value="'.$row2['id'].'">'."\n".$row2['nombre']."</a>   ";
			}
			?>
						</select>
							</div>
						</div>
							<div>
								<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar"></form>
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