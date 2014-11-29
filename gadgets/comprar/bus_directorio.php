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
		$ruta='bus_directorio.php';
	}
?>
<div align="center">
	<form action="comprar.php" method="get">
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
			$sql = "SELECT comprar_directorio.id,comprar_directorio.name,comprar_directorio.city,comprar_directorio.state,comprar_directorio.country,general_visible.nombre FROM comprar_directorio INNER JOIN general_visible ON comprar_directorio.activated = general_visible.id ";
			$celdas=array(0=>'id',1=>'name',2=>'city',3=>'state',4=>'country',5=>'activated');
			$pez=" WHERE comprar_directorio.id > 0 AND (comprar_directorio.name like '%" . $criterio . "%' or comprar_directorio.city like '%" . $criterio . "%' or comprar_directorio.state like '%" . $criterio . "%' or comprar_directorio.country like '%" . $criterio . "%') ";
			$set='if_directorio_a.php';
			$borra=2;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>