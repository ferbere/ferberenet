<?php
if (isset($_GET['pag'])){
	$pag=$_GET['pag'];
}else{
	$pag=0;
}
if(isset($_GET['criterio'])){
	$criterio = $_GET['criterio'];
}
if(isset($_GET['ruta'])){
	$ruta = $_GET['ruta'];
}
	if(empty($ruta)){
		$ruta='bus_contenidos.php';
	}
?>
<div align="center">
	<form action="social.php" method="get">
	Criterio de búsqueda:
		<input type="hidden" name="ruta" value="<?php echo $ruta ?>">
		<input type="text" name="criterio" size="22" maxlength="150">
		<input type="submit" value="Buscar">
	</form>
</div>
	<div style="margin: 0px auto">
<?php
//			include_once("../classes/sacar.class.php");
			$self=sacar($_SERVER['PHP_SELF'],"admin/",".php");	
			include_once("classes/buscador_contenidos.class.php");
			$sql = "SELECT articulos_index.id,articulos_index.titulo,articulos_ediciones.nombre,usuario_index.nombre,DATE_FORMAT(articulos_index.fecha,'%d/%m/%Y'),general_visible.nombre,articulos_conflicto.nombre FROM articulos_index INNER JOIN articulos_ediciones ON articulos_index.edicion = articulos_ediciones.id INNER JOIN usuario_index ON articulos_index.autor = usuario_index.id INNER JOIN general_visible ON articulos_index.publicado = general_visible.id INNER JOIN articulos_conflicto ON articulos_index.conflicto = articulos_conflicto.id ";
			$celdas=array(0=>'id',1=>'titulo',2=>'edicion',3=>'autor',4=>'fecha',5=>'publicado',6=>'conf. derechos');
			$pez=" where articulos_index.titulo like '%" . $criterio . "%' or articulos_index.subtitulo like '%" . $criterio . "%' or articulos_index.contenido like '%" . $criterio . "%' or articulos_ediciones.nombre like '%" . $criterio . "%' or usuario_index.nombre like '%" . $criterio . "%' or articulos_index.fecha like '%".$criterio."%'";
			$set='sh_contenidos.php';
			$borra=1;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>