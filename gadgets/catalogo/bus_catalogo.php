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
		$ruta='bus_catalogo.php';
	}
?>
<div align="center">
	<form action="catalogo.php" method="get">
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
//			$sql = "SELECT id,nombre,subnombre FROM catalogo_index WHERE id != 0 ";
	$sql = "SELECT catalogo_index.id,catalogo_index.nombre,catalogo_index.imagen,catalogo_categoria.nombre,catalogo_index.existe FROM catalogo_index INNER JOIN catalogo_categoria ON catalogo_index.categoria = catalogo_categoria.id  ";
	
	$celdas=array(0=>'id',1=>'nombre',2=>'imagen',3=>'categoria',4=>'existencias');
	$pez=" where catalogo_index.nombre like '%" . $criterio . "%' or catalogo_index.subnombre like '%" . $criterio . "%' or catalogo_index.descripcion like '%" . $criterio . "%' or catalogo_categoria.nombre like '%" . $criterio . "%' or catalogo_index.imagen like '%" . $criterio . "%'";
	$set='if_catalogo_a.php';
	$ruta='bus_	catalogo.php';
	$borra=1;
	$clPag = new paginacion();
	$clPag->cuantos($sql,$pez);
	$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
	$clPag->pie($pag,$sql,$pez,$self);
?>
</div>
</div>