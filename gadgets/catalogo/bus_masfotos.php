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
	$sql = "SELECT catalogo_masfotos.id,catalogo_masfotos.nombre,catalogo_masfotos.imagen,catalogo_index.nombre FROM catalogo_masfotos INNER JOIN catalogo_index ON catalogo_masfotos.vincula = catalogo_index.id  ";
	
	$celdas=array(0=>'id',1=>'nombre',2=>'imagen',3=>'nombre');
	$pez=" where catalogo_masfotos.nombre like '%" . $criterio . "%' or catalogo_masfotos.descripcion like '%" . $criterio . "%' or catalogo_index.nombre like '%" . $criterio . "%' or catalogo_masfotos.imagen like '%" . $criterio . "%'";
	$set='if_masfotos_a.php';
	$ruta='bus_masfotos.php';
	$borra=3;
	$clPag = new paginacion();
	$clPag->cuantos($sql,$pez);
	$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
	$clPag->pie($pag,$sql,$pez,$self);
?>
</div>
</div>