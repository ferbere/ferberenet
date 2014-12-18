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
			$self=sacar($_SERVER['PHP_SELF'],"admin/",".php");
			include_once("classes/buscador_iniciativabb.class.php");
			$sql = "SELECT perfil_iniciativa.id,perfil_iniciativa.nombre,perfil_iniciativa_cat.nombre,general_visible.nombre FROM perfil_iniciativa INNER JOIN perfil_iniciativa_cat ON perfil_iniciativa.categoria = perfil_iniciativa_cat.id INNER JOIN general_visible ON perfil_iniciativa.visible = general_visible.id WHERE perfil_iniciativa.id != 0 ";
			$celdas=array(0=>'id',1=>'nombre',2=>'categoria',3=>'visible');
			$pez=" and perfil_iniciativa.nombre like '%" . $criterio . "%' or perfil_iniciativa.texto like '%" . $criterio . "%' or perfil_iniciativa_cat.nombre like '%" . $criterio . "%'";
			$set='if_iniciativa_a.php';
			$borra=7;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>