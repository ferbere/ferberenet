<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	include_once("classes/conex.php");
	include("library/tinymce.php");
	include("library/confirm.php");
	$link=Conectarse();
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
		$sql_cat=mysql_query("SELECT id,nombre FROM noticias_categoria",$link);
?>
		<div id="form-main">
			<form method="post" action="gadgets/noticias/ip_noticias.php" enctype="multipart/form-data">
		   	 <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
	<div id="maincontent-tit">
		Noticia nueva
	</div>
	<div id="maincontent-body">
		<div>
				Título:<br>
			<input type="text" name="titulo" size="100"><br>
				Subtítulo:<br>
			<input type="text" name="subtitulo" size="100"><br>
				Fecha:<br>
				<input type="date" name="fecha" placeholder="YYYY-MM-DD"><br>							
				Categoría:<br><select name="categoria">
<?php
while ($row_cat=mysql_fetch_array($sql_cat)){
echo '<option value="'.$row_cat[0].'">'."\n".$row_cat[1]."</a>   ";
}
?>
				</select><br><br>
				Imagen:<br>
				<input type="file" name="imagen" ><br>
				Contenido:<br>
			<textarea name="contenido" rows=19 cols=80 width:300px height:40px></textarea><br>
				Publicado:<br>
			Sí <input type="radio" name="publicado" value="1" size="30">
			No <input type="radio" name="publicado" value="0" size="30" checked><br><br>

			<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
			</form>
			</div>
		</div>
<?php
	}elseif($capturado==1){
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}elseif($capturado==0){
		echo "Algo pasó. Así nomás, algo pasó.";
	}elseif($capturado==2){
		echo "hay un problema con la foto.";
	}
}else{
	echo "Usted no tiene acceso a esta seccción";
}
 ?>