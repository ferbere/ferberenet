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
			<form method="post" action="gadgets/noticias/ip_noticias.php">
<?php
		$sql=mysql_query("SELECT id,nombre FROM secciones",$link);
		if(($_SESSION['privilegioss']=='ferbere')OR($_SESSION['privilegioss']=='superadmin')){
			$sql2=mysql_query("SELECT id,nombre FROM user" ,$link);
			$sql3=mysql_query("SELECT id,nombre FROM banner_dir" ,$link);
		}else{
			$sql2=mysql_query("SELECT id,nombre FROM user WHERE id = ".$_SESSION['id'] ,$link);
		}
?>
	<div id="maincontent-tit">
		Noticia nueva
	</div>
	<div id="maincontent-body">
		<div>
				Título:<br>
			<input type="text" name="titulo" size="100"><br>
				Subtítulo:<br>
			<input type="text" name="subtitulo" size="100"><br>
				Imagen:<br>
			<input type="text" name="imagen" size="30">.jpg<br>
				Contenido:<br>
			<textarea name="contenido" rows=19 cols=80 width:300px height:40px></textarea><br>
<?php
	if(($_SESSION['privilegioss']=='ferbere')OR($_SESSION['privilegioss']=='ferbere')){
?>
				Publicado:<br>
			Sí <input type="radio" name="publicado" value="1" size="30">
			No <input type="radio" name="publicado" value="0" size="30" checked><?php } ?><br><br>
				Autor: <br>
			<select name="autor">
<?php
while ($row2=mysql_fetch_array($sql2)){
	echo '<option value="'.$row2['id'].'">'."\n".$row2['nombre']."</a>   ";
}
?>
	</select><br><br>
				Banner:
			<select name="banner">
<?php
while ($row3=mysql_fetch_array($sql3)){
	echo '<option value="'.$row3['id'].'">'."\n".$row3['nombre']."</a>   ";
}
?>
			</select><br>
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