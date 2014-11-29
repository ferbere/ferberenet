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
		$ruta='bus_proyectos.php';
	}
?>
<div align="center">
	<form action="proyectos.php" method="get">
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
			$sql = "SELECT id,titulo,cliente,fecha,proyecto,publicado FROM proyectos_index ";
			$celdas=array(0=>'id',1=>'titulo',2=>'cliente',3=>'fecha',4=>'proyecto',5=>'publicado');
			$pez=" where titulo like '%" . $criterio . "%' or cliente like '%" . $criterio . "%' or contenido like '%" . $criterio . "%'";
			$set='if_proyectos_a.php';
			$ruta='bus_proyectos.php';
			$borra=1;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>