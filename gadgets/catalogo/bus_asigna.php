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
if(isset($_GET['rubro'])){
	$rubro = $_GET['rubro'];
}
if(isset($_GET['ruta'])){
	$ruta = $_GET['ruta'];
}
	if(empty($ruta)){
		$ruta='bus_banner.php';
	}
?>
<div id="form-main_bann1" align="center">
<div align="center">
	<form action="catalogo.php" method="get">
	Criterio de búsqueda:
		<input type="hidden" name="ruta" value="<?php echo $ruta ?>">
		<input type="text" name="criterio" size="22" maxlength="150">
		<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
		<input type="submit" value="Buscar">
	</form>
</div>
	<div style="margin: 0px auto">
<?php
			include_once("classes/sacar.class.php");
			$self=sacar($_SERVER['PHP_SELF'],"ferberenet/",".php");	
			include_once("classes/buscador_asigna.class.php");
			$sql = "SELECT catalogo_index.id,catalogo_index.nombre,catalogo_categoria.nombre,catalogo_index.imagen,catalogo_asigna.label FROM catalogo_index INNER JOIN catalogo_categoria ON catalogo_index.categoria = catalogo_categoria.id LEFT JOIN catalogo_asigna ON catalogo_index.id = catalogo_asigna.pieza ";
//			$sql2 = "SELECT catalogo_label.nombre,catalogo_asigna.label FROM catalogo_label INNER JOIN catalogo_asigna ON catalogo_label.id = catalogo_asigna.label WHERE catalogo_asigna.label = '$rubro'";
			$pez=" where catalogo_index.nombre like '%" . $criterio . "%' or catalogo_index.imagen like '%" . $criterio . "%' or catalogo_categoria.nombre like '%" . $criterio . "%' ";
			$set='if_asigna_a.php';
			$ruta='bus_asigna.php';
			$borra=1;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self,$rubro,$sql2);
			$clPag->pie($pag,$sql,$pez,$self,$rubro);
?>
	</div>
</div>