<?php
if (isset($_GET['pag'])){
	$pag=$_GET['pag'];
}else{
	$pag=0;
}
if(isset($_GET['criterio'])){
	$criterio = $_GET['criterio'];
}else{
	$criterio='';
}
if(isset($_GET['ruta'])){
	$ruta = $_GET['ruta'];
}
	if(empty($ruta)){
		$ruta='bus_articulos.php';
	}
?>
<div align="center">
	<form action="articulos.php" method="get">
	Criterio de búsqueda:
		<input type="hidden" name="ruta" value="<?php echo $ruta ?>">
		<input type="text" name="criterio" size="22" maxlength="150">
		<input type="submit" value="Buscar">
	</form>
</div>
	<div style="margin: 0px auto">
<?php
			include_once("classes/sacar.class.php");
			$self=sacar($_SERVER['PHP_SELF'],"ferberenet/",".php");	
			include_once("classes/buscador_articulos.class.php");
			$sql = "SELECT articulos_index.id,articulos_index.titulo,articulos_index.fecha,articulos_categoria.nombre,articulos_index.imagen,general_visible.nombre FROM articulos_index INNER JOIN articulos_categoria ON articulos_index.categoria = articulos_categoria.id INNER JOIN general_visible ON articulos_index.publicado = general_visible.id ";
			$celdas=array(0=>'id',1=>'titulo',2=>'fecha',3=>'categoría',4=>'imagen',5=>'publicado');
			$pez=" where articulos_index.titulo like '%" . $criterio . "%' or articulos_index.subtitulo like '%" . $criterio . "%' or articulos_index.contenido like '%" . $criterio . "%' or articulos_categoria.nombre like '%" . $criterio . "%'";
			$set='if_articulos_a.php';
			$ruta='bus_articulos.php';
			$order=" ORDER BY fecha DESC LIMIT ";
			$borra=1;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$order,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>
</div>