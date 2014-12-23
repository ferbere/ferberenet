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
		$ruta='bus_codigo.php';
	}
?>
<div align="center">
	<form action="codigo.php" method="get">
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
			include_once("classes/buscador.class.php");
			$sql = "SELECT codigo_index.id,codigo_index.nombre,codigo_categoria.nombre,codigo_index.contenido FROM codigo_index INNER JOIN codigo_categoria ON codigo_index.categoria = codigo_categoria.id ";
			$celdas=array(0=>'id',1=>'nombre',2=>'categoria');
			$pez=" where codigo_index.nombre like '%" . $criterio . "%' or codigo_index.contenido like '%" . $criterio . "%' or codigo_categoria.nombre like '%" . $criterio . "%'";
			$set='if_codigo_a.php';
			$borra=1;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>
