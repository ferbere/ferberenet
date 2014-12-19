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
		$ruta='bus_noticias.php';
	}
?>
<div align="center">
	<form action="noticias.php" method="get">
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
			include_once("classes/buscador_noticias.class.php");
			$sql = "SELECT noticias_index.id,noticias_index.titulo,noticias_index.fecha,noticias_categoria.nombre,general_visible.nombre,noticias_index.orden FROM noticias_index INNER JOIN noticias_categoria ON noticias_index.categoria = noticias_categoria.id INNER JOIN general_visible ON noticias_index.publicado = general_visible.id ";
			$celdas=array(0=>'id',1=>'titulo',2=>'fecha',3=>'categoría',4=>'publicado',5=>'orden');
			$pez=" where noticias_index.titulo like '%" . $criterio . "%' or noticias_index.subtitulo like '%" . $criterio . "%' or noticias_index.contenido like '%" . $criterio . "%' or noticias_categoria.nombre like '%" . $criterio . "%'";
			$set='if_noticias_a.php';
			$ruta='bus_noticias.php';
			$borra=1;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>