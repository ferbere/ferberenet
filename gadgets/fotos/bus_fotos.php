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
		$ruta='bus_fotos.php';
	}
?>
<div align="center">
	<form action="fotos.php" method="get">
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
			$sql = "SELECT fotos_index.id,fotos_index.nombre,fotos_index.imagen,fotos_categoria.nombre,general_visible.nombre,fotos_index.fecha FROM fotos_index INNER JOIN fotos_categoria ON fotos_index.categoria = fotos_categoria.id INNER JOIN general_visible ON fotos_index.visible = general_visible.id ";
			
			$celdas=array(0=>'id',1=>'nombre',2=>'imagen',3=>'categoria',4=>'visible',5=>'fecha');
			$pez=" where fotos_index.nombre like '%" . $criterio . "%' or fotos_index.subnombre like '%" . $criterio . "%' or fotos_index.descripcion like '%" . $criterio . "%' or fotos_categoria.nombre like '%" . $criterio . "%' or fotos_index.imagen like '%" . $criterio . "%' or fotos_index.fecha like '%" . $criterio . "%'";
			$set='if_fotos_a.php';
			$ruta='bus_	fotos.php';
			$borra=1;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>