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
		$ruta='bus_iniciativa.php';
	}
?>
<div align="center">
	<form action="perfil.php" method="get">
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
			include_once("classes/buscador_iniciativa.class.php");
			$sql = "SELECT propuesta_index.id,propuesta_index.nombre,propuesta_categoria.nombre,general_visible.nombre FROM propuesta_index INNER JOIN propuesta_categoria ON propuesta_index.categoria = propuesta_categoria.id INNER JOIN general_visible ON propuesta_index.visible = general_visible.id WHERE propuesta_index.id != 0 ";
//			$sql2 = "SELECT perfil_index.nombre FROM perfil_index INNER JOIN perfil_asigna_iniciativa ON perfil_index.id = perfil_asigna_iniciativa.diputado WHERE perfil_asigna_iniciativa.iniciativa = 2 ";
			$celdas=array(0=>'id',1=>'nombre',2=>'categoria',3=>'visible');
			$pez=" and propuesta_index.nombre like '%" . $criterio . "%' or propuesta_index.texto like '%" . $criterio . "%' or propuesta_categoria.nombre like '%" . $criterio . "%'";
			$set='if_propuesta_a.php';
			$borra=1;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>