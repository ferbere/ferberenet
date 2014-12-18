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
		$ruta='bus_asigna_iniciativa.php';
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
			include_once("classes/buscador.class.php");
//			$sql = "SELECT id,diputado,iniciativa,suscribe FROM perfil_asigna_iniciativa WHERE id != 0 ";
			$sql = "SELECT perfil_asigna_iniciativa.id,perfil_index.nombre,perfil_iniciativa.nombre,general_visible.nombre FROM perfil_asigna_iniciativa INNER JOIN perfil_index ON perfil_index.id = perfil_asigna_iniciativa.diputado INNER JOIN perfil_iniciativa ON perfil_iniciativa.id = perfil_asigna_iniciativa.iniciativa INNER JOIN general_visible ON general_visible.id = perfil_asigna_iniciativa.suscribe WHERE perfil_asigna_iniciativa.id != 0 ";
			$celdas=array(0=>'id',1=>'diputado',2=>'iniciativa',3=>'suscribe');
			$pez=" and perfil_index.nombre like '%" . $criterio . "%' or perfil_iniciativa.nombre like '%" . $criterio . "%' or general_visible.nombre like '%" . $criterio . "%'";
			$set='if_asigna_iniciativa_a.php';
			$borra=8;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>