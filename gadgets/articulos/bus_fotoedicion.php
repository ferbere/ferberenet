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
		$ruta='bus_fotoedicion.php';
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
			$self=sacar($_SERVER['PHP_SELF'],"admin/",".php");
			include_once("classes/buscador.class.php");
			$sql = "SELECT articulos_fotoedicion.id,articulos_fotoedicion.imagen,articulos_ediciones.nombre FROM articulos_fotoedicion INNER JOIN articulos_ediciones ON articulos_fotoedicion.edicion = articulos_ediciones.id ";
			$celdas=array(0=>'id',1=>'imagen',2=>'edicion');
			$pez=" where articulos_fotoedicion.imagen like '%" . $criterio . "%' or articulos_ediciones.nombre like '%" . $criterio . "%'";
			$set='if_fotoedicion_a.php';
			$borra=5;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>