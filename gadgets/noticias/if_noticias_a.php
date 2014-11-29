<?php
session_start();
include("../library/tinymce.php");
include("../library/confirm.php");
if($_SESSION['privilegioss']=="ferbere"){
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
		$link=Conectarse();
		if(isset($_GET['rubro'])){
			$rubro=$_GET['rubro'];
		}
?>
		<div id="form-main">
			<form method="post" action="gadgets/noticias/ip_noticias_a.php">
			<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
<?php
$sql= mysql_query("SELECT * FROM noticias_index WHERE id = '$rubro' ",$link);
while ($row = mysql_fetch_array($sql)){
	$bole=$row["id"]; 
	$seccion=$row['seccion'];
?>
	<div id="maincontent-tit">
		Editar artículo
	</div>
		<div id="maincontent-body">
			<div>
			Título:<br>
		<input type="text" name="titulo" style="width:95%" value="<?php echo $row['titulo'] ?>" /><br>
			Subtítulo:<br>
		<input type="text" name="subtitulo" style="width:95%" value="<?php echo $row['subtitulo'] ?>" /><br>
			Imagen:<br>
		<input type="text" name="imagen" size="30" value="<?php echo $row['imagen'] ?>" />.jpg <br>
			Orden:<br>
		<input type="text" name="orden" size="5" value="<?php echo $row['orden'] ?>"><br>
			Banner:<br>
		<select name="banner">
<?php
$sqlB=mysql_query("SELECT id,nombre FROM banners_dir ORDER BY id ASC ",$link);
$sqlB2=mysql_query("SELECT MAX(id) as max FROM banners_dir ",$link);
$rowB2=mysql_fetch_array($sqlB2);
while($rowB=mysql_fetch_array($sqlB)){
	if($rowB2[0]==$rowE['id']){
		$edicion_def=$rowB['nombre'];
	}
	if($row['banner']!=$rowB['id']){
		$hig= 'nain';
	}else{$hig="selected";}
		echo '<option value="'.$rowB['id'].'"'.$hig.'>'.$rowB['nombre'].'</option>';
	}
?>
		</select><br><br>
<?php
if($row['publicado']==0){
	$publino="checked";
	$publisi="nain";
}elseif($row['publicado']==1){
	$publino="nain";
	$publisi="checked";
}
?>
			Publicado:<br>
		Sí <input type="radio" name="publicado" value="1" size="30" <?php echo $publisi ?>>
		No <input type="radio" name="publicado" value="0" size="30" <?php echo $publino ?>><br><br>
			Contenido:<br>
		<textarea name="contenido" rows=19 cols=70 width:300px height:40px><?php echo $row['contenido'] ?></textarea><br>
			Ruta:<br>
		<select name="ruta">
<?php
$sqlRC=mysql_query("SELECT id,nombre FROM rutas_corporativa ORDER BY id ASC ",$link);
$sqlRC2=mysql_query("SELECT MAX(id) as max FROM rutas_corporativa ",$link);
$rowRC2=mysql_fetch_array($sqlRC2);
while($rowRC=mysql_fetch_array($sqlRC)){
	if($rowRC2[0]==$row['ruta']){
	//$ruta=$row['ruta'];
	}
	if($row['ruta']!=$rowRC['id']){
		$higRC= 'nain';
	}else{$higRC="selected";}
		echo '<option value="'.$rowRC['id'].'"'.$higRC.'>'.$rowRC['nombre'].'</option>';
	}
?>
				</select>
			</div>
				<div><br>
					<input type="submit"  value="enviar">
					</form>
				</div>

<?php
}
?>
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
