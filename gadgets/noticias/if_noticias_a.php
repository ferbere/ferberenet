<?php
session_start();
include("../library/tinymce.php");
include("../library/confirm.php");
if(($_SESSION['privilegioss']=="ferbere")||($_SESSION['privilegioss']=="admin")){
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
		$link=Conectarse();
		if(isset($_GET['rubro'])){
			$rubro=$_GET['rubro'];
		}
?>
<form method="post" action="gadgets/noticias/ip_noticias_a.php" enctype="multipart/form-data">
 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
	<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
<?php
$sql= mysql_query("SELECT id,titulo,subtitulo,contenido,publicado,fecha,imagen,orden,categoria FROM noticias_index WHERE id = '$rubro' ",$link);
while ($row = mysql_fetch_array($sql)){
	$id 			=	$row[0]; 
	$titulo			=	$row[1]; 
	$subtitulo		=	$row[2]; 
	$contenido		=	$row[3]; 
	$publicado		=	$row[4]; 
	$fecha			=	$row[5]; 
	$imagen			=	$row[6]; 
	$orden			=	$row[7]; 
	$categoria 		= 	$row[8];
}
?>
	<div id="maincontent-tit">
		Editar artículo
	</div>
		<div id="maincontent-body">
			<div>
			Título:<br>
		<input type="text" name="titulo" style="width:95%" value="<?php echo $titulo ?>" /><br>
			Subtítulo:<br>
		<input type="text" name="subtitulo" style="width:95%" value="<?php echo $subtitulo ?>" /><br>
			Fecha:<br>
		<input type="date" name="fecha" value="<?php echo $fecha ?>" /><br><br>
		<?php
		if(empty($imagen)){?>
			Imagen: 
			<input type="file" name="imagen" ><br><br><br>
			
<?php		}else{?>
			Imagen: <b><?php echo $imagen; ?></b><br>
			<a href="gadgets/noticias/borra_imagen.php?rubro=<?php echo $id; ?>">Borrar y cargar otra imagen</a><br><br><br>	
<?php } ?>			
			Categoría:<br>
			<select name="categoria">
<?php
$sqlCat=mysql_query("SELECT id,nombre FROM noticias_categoria ORDER BY id ASC ",$link);
while($rowCat=mysql_fetch_array($sqlCat)){
	if($categoria!=$rowCat['id']){
		$cat= 'nain';
	}else{
		$cat="selected";
	}?>
	<option value="<?php echo $rowCat['id']; ?>"<?php echo $cat;?>>
		<?php echo $rowCat['nombre'];?>
	</option>
<?php }
?>
			</select>
			<br><br>
			Orden:<br>
		<input type="text" name="orden" size="5" value="<?php echo $orden ?>"><br>
<?php
if($publicado==0){
	$publino="checked";
	$publisi="nain";
}elseif($publicado==1){
	$publino="nain";
	$publisi="checked";
}
?><br>
			Publicado:<br>
		Sí <input type="radio" name="publicado" value="1" size="30" <?php echo $publisi ?>>
		No <input type="radio" name="publicado" value="0" size="30" <?php echo $publino ?>><br><br>
		<?php
		if($categoria==2){
			$cadena = $contenido;
			$ejemplo = strlen($cadena);
			echo "El texto mide: $ejemplo caracteres (con espacios), y";
			if($ejemplo<400){
				echo ' aparecerá completo en la página principal.';
			}else{
				echo ' un extracto del texto aparecerá en la página principal, y la liga a "leer más."';
			}
		}
		?><br><br>
			Contenido:<br>
		<textarea name="contenido" rows=19 cols=70 width:300px height:40px><?php echo $contenido ?></textarea><br>
			</div>
				<div><br>
					<input type="submit"  value="enviar">
					</form>
				</div>
		</div>
	</div>
<?php
		
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
echo "Usted no tiene acceso a esta sección";
}		
?>
