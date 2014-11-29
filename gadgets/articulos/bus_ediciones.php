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
		$ruta='bus_ediciones.php';
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
			include_once("classes/buscador_ediciones.class.php");
			$sql = "SELECT id,nombre,imagen FROM articulos_ediciones WHERE id > 1 ";
			$celdas=array(0=>'id',1=>'nombre',2=>'imagen');
			$pez=" and (nombre like '%" . $criterio . "%' or imagen like '%" . $criterio . "%')";
			$set='if_ediciones_a.php';
			$ruta='bus_ediciones.php';
			$order=" ORDER BY id DESC LIMIT ";
			$borra=4;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$order,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>