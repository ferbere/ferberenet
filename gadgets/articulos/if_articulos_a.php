<?php
session_start();
include("library/tinymce.php");
include("library/confirm.php");
if(($_SESSION['privilegioss']=="ferbere")||($_SESSION['privilegioss']=="admin")){
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
		$link=Conectarse();
		if(isset($_GET['rubro'])){
			$rubro=$_GET['rubro'];
		}
		$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
		$url=mysql_fetch_array($sql_u);
		if($url[1]==''){
			$url_d='../'.$_SESSION["admin"].'/images/articulos/';
		}else{
			$url_d='http://'.$url[1].'/'.$_SESSION['admin'].'/images/articulos/';
		}
?>
<form method="post" action="gadgets/articulos/ip_articulos_a.php" enctype="multipart/form-data">
 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
	<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
<?php
		$sql= mysql_query("SELECT articulos_index.titulo,articulos_index.subtitulo,articulos_categoria.nombre,articulos_index.imagen,articulos_index.contenido,articulos_index.publicado,usuario_index.nombre,articulos_index.fecha,articulos_index.tag FROM articulos_index INNER JOIN articulos_categoria ON articulos_index.categoria = articulos_categoria.id INNER JOIN usuario_index ON articulos_index.autor = usuario_index.id WHERE articulos_index.id = '$rubro' ",$link);
		while ($row = mysql_fetch_array($sql)){
			$titulo		=	$row[0];
			$subtitulo	=	$row[1];
			$categoria	=	$row[2];
			$imagen		=	$row[3];
			$contenido	=	$row[4];
			$publicado	=	$row[5];
			$autor		=	$row[6];
			$fecha		= 	$row[7];
			$tag		= 	$row[8];
		}
		?>
	<h1>Editar artículo</h1>
	<img src="<?php echo $url_d.$imagen; ?>" height="200px"><br>
	<?php echo $imagen; ?>
	<label>Título</label>
	<input type="text" name="titulo" value="<?php echo $titulo ?>" />
	<label>Subtítulo</label>
	<input type="text" name="subtitulo" value="<?php echo $subtitulo ?>"/>
	<label>Fecha<?php echo $fecha; ?></label>
	<label>Sección</label>
	<select name="categoria">
<?php
$sqlCat=mysql_query("SELECT id,nombre FROM articulos_categoria ORDER BY id ASC ",$link);
while($rowCat=mysql_fetch_array($sqlCat)){
if($categoria!=$rowCat['nombre']){
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
	<fieldset>
		<legend>Imagen</legend>
<?php
		if(empty($imagen)){?>
			<input type="file" name="imagen">

<?php		}else{?>
		<?php echo $imagen; ?>
			<a href="gadgets/articulos/borra_imagen.php?rubro=<?php echo $rubro; ?>">Borrar y cargar otra imagen</a>
<?php } ?>			
	</fieldset>
	<label>Contenido</label>
	<textarea name="contenido"><?php echo $contenido ?></textarea>
			<?php
			if($publicado==0){
			$publino="checked";
			$publisi="nain";
			}elseif($publicado==1){
			$publino="nain";
			$publisi="checked";
			}
			?>
	<fieldset>
		<div id="radio">
			<legend>Publicado</legend>
			<label for="1" class="not">Sí</label>
			<input type="radio" class="not2" name="publicado" value="1"<?php echo $publisi ?>>
			<label for="0" class="not">No</label>
			<input type="radio" class="not2" name="publicado" value="0" <?php echo $publino ?>>
		</div>
	</fieldset>
	<label>Autor</label>
	<select name="autor">
			<?php
			$sqlaut=mysql_query("SELECT id,nombre FROM usuario_index ORDER BY id ASC ",$link);
			while($rowaut=mysql_fetch_array($sqlaut)){
			if($autor!=$rowaut[1]){
				$aut= 'nain';
			}else{
				$aut="selected";
			}
				echo '<option value="'.$rowaut['id'].'"'.$aut.'>'.$rowaut['nombre'].'</option>';
			}
			?>
	</select>
				<fieldset>
				<legend>Etiquetas:</legend>
<?php
$privv= decbin($tag);
/*
echo $tag.'<br>';
echo $privv.'<br><br>';*/
$sql_tag=mysql_query("SELECT nombre FROM articulos_tag ORDER BY id DESC",$link);
$cuenta=mysql_num_rows($sql_tag);

$privv_def=str_pad($privv,$cuenta,'0',STR_PAD_LEFT);

echo '<br>';
$h=$cuenta;
$j=1;
while($row_tag=mysql_fetch_array($sql_tag)){
	if($privv_def{$j-1}==1){
		$high='checked';
	}else{
		$high='nain';
	}
	echo '<input type="checkbox" name="tag[]" value="'.$j.'"'.$high.'>'.$row_tag[0].'  ';
	$h=$h-1;
	$j=$j+1;
}
?>
			</fieldset>
	<input type="hidden" name="cuenta" value="<?php echo $cuenta ?>">
	<input type="submit"  value="enviar">
</form>
<?php
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
echo "Usted no tiene acceso a esta sección";
}		
?>
