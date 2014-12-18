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
		$ruta='bus_asigna.php';
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
			include_once("classes/buscador.class.php");
//			$sql = "SELECT id,diputado,comision,preside FROM perfil_asigna_comisiones WHERE id != 0 ";
			$sql = "SELECT perfil_asigna_comisiones.id,perfil_index.nombre,perfil_comisiones.nombre,general_visible.nombre FROM perfil_asigna_comisiones INNER JOIN perfil_index ON perfil_index.id = perfil_asigna_comisiones.diputado INNER JOIN perfil_comisiones ON perfil_comisiones.id = perfil_asigna_comisiones.comision INNER JOIN general_visible ON general_visible.id = perfil_asigna_comisiones.preside WHERE perfil_asigna_comisiones.id != 0 ";
			$celdas=array(0=>'id',1=>'diputado',2=>'comisión',3=>'preside');
			$pez=" and perfil_index.nombre like '%" . $criterio . "%' or perfil_comisiones.nombre like '%" . $criterio . "%' or general_visible.nombre like '%" . $criterio . "%'";
			$set='if_asigna_a.php';
			$borra=4;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>