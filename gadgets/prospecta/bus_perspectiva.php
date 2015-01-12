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
		$ruta='bus_perspectiva.php';
	}
?>
<div align="center">
	<form action="prospecta.php" method="get">
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
			$sql = "SELECT prospecta_perspectiva.id,prospecta_perspectiva.nombre,general_visible.nombre FROM prospecta_perspectiva INNER JOIN general_visible ON prospecta_perspectiva.visible = general_visible.id";
			$celdas=array(0=>'id',1=>'nombre',2=>'visible');
			$pez=" where prospecta_perspectiva.nombre like '%" . $criterio . "%' or general_visible.nombre like '%" . $criterio . "%'";
			$set='if_perspectiva_a.php';
			$borra=4;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>