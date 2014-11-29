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
		$ruta='bus_testimonios.php';
	}
?>
<div align="center">
	<form action="testimonios.php" method="get">
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
			$sql = "SELECT testimonios_index.id,testimonios_index.titulo,general_visible.nombre,testimonios_index.fecha,testimonios_index.orden FROM testimonios_index INNER JOIN general_visible ON testimonios_index.visible = general_visible.id WHERE testimonios_index.id != 0 ";
			$celdas=array(0=>'id',1=>'titulo',2=>'visible',3=>'fecha',4=>'orden');
			$pez=" and testimonios_index.titulo like '%" . $criterio . "%' or testimonios_index.contenido like '%" . $criterio . "%'";
			$set='if_testimonios_a.php';
			$ruta='bus_	testimonios.php';
			$borra=1;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>