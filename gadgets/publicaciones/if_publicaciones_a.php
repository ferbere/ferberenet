<?php
session_start();
include("../library/tinymce.php");
include("../library/confirm.php");
if($_SESSION['privilegioss']=="ferbere"){
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
	
	if(empty($capturado)){
		$link=Conectarse();
?>
		<div id="form-main">
			<form method="post" action="gadgets/publicaciones/ip_publicaciones_a.php">
			<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
<?php
        $sql=mysql_query("SELECT * FROM publicaciones_index WHERE id = '$rubro'",$link);
        while ($row=mysql_fetch_array($sql)){
?>
				Nombre:<br>
			<input type="text" name="titulo" size="80%" value="<?php echo $row['titulo'] ?>"><br>
				Género:<br>
			<input type="text" name="genero" size="50%" value="<?php echo $row['genero'] ?>"><br>
				Editor:<br>
			<input type="text" name="editor" size="80%" value="<?php echo $row['editor'] ?>"><br>
				Imagen:<br>
			<input type="text" name="imagen" size="30" value="<?php echo $row['imagen'] ?>">.jpg<br>
				Extensión:<br>
			<input type="text" name="ext" value="<?php echo $row['ext'] ?>"> páginas<br><br>
				Año:<br>
			<input type="text" name="year" value="<?php echo $row['year'] ?>"><br><br>
				Contenido:<br>
			<textarea name="contenido" rows=19 cols=80 width:300px height:40px><?php echo $row['contenido']?></textarea><br>
<?php
	if($row['publicado']==1){
		$publino="nain";
		$publisi="checked";
		$editores="nain";
	}elseif($row['publicado']==2){
		$publino="checked";
		$publisi="nain";
	}
?>                                                    
			Publicado:<br>
			Sí <input type="radio" name="publicado" value="1" size="30" <?php echo $publisi ?> >
			No <input type="radio" name="publicado" value="2" size="30" <?php echo $publino ?> >
			</div>
				<div>
					<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar"></form>
				</div>
		</div>
		<?php
		}
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
	echo "Usted no tiene acceso a esta sección";
}		
?>
