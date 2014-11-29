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
<?php
		$sql= mysql_query("SELECT articulos_index.titulo,articulos_index.subtitulo,articulos_categoria.nombre,articulos_index.imagen,articulos_ediciones.nombre,articulos_index.contenido,general_visible.nombre,usuario_index.nombre,articulos_conflicto.nombre FROM articulos_index INNER JOIN articulos_categoria ON articulos_index.categoria = articulos_categoria.id INNER JOIN articulos_ediciones ON articulos_index.edicion = articulos_ediciones.id INNER JOIN general_visible ON articulos_index.publicado = general_visible.id  INNER JOIN usuario_index ON articulos_index.autor = usuario_index.id INNER JOIN articulos_conflicto ON articulos_index.conflicto = articulos_conflicto.id WHERE articulos_index.id = '$rubro' ",$link);
		while ($row = mysql_fetch_array($sql)){
			$titulo		=	$row[0];
			$subtitulo	=	$row[1];
			$categoria	=	$row[2];
			$imagen		=	$row[3];
			$ediciones	=	$row[4];
			$contenido	=	$row[5];
			$publicado	=	$row[6];
			$autor		=	$row[7];
			$conflicto	=	$row[8];
		}
		?>
	<div id="maincontent-tit">
		Leer artículo
	</div>
	<div id="maincontent-body">
		<div><br><br>
			<div style="text-align:center">
				<img src="../images/articulo/<?php echo $imagen; ?>.jpg" >
			</div><br><br>
				<h2><?php echo $titulo ?></h2>
				<b>Subtítulo:</b><br>
				<h4><?php echo $subtitulo ?></h4>
		</div>
		<div style="width:500px; height: 50px">
			<div >
				<b>Sección:</b> 
				<?php echo $categoria ?>
			</div>
		</div>
		<div ><b>Edición:</b> <?php echo $ediciones ?><br><br></div>
		<div><b>Contenido:</b><br>
			<?php echo $contenido ?>
		</div>
		<div style="float:left">
			<b>Publicado:</b> <?php echo $publicado ?>
		</div>
		<div style="position:relative;left:150px">
			<b>Autor:</b> <?php echo $autor?>
		</div>
		<div style="both:clean"><br>
			<b>Conflictos de derechos de autor:</b> <?php echo $conflicto?>
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
