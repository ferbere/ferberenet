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
		$ruta='bus_perfil.php';
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
			$sql = "SELECT perfil_index.id,perfil_index.nombre,perfil_index.imagen,perfil_categoria.nombre,perfil_index.orden FROM perfil_index INNER JOIN perfil_categoria ON perfil_index.categoria = perfil_categoria.id  ";
			
			$celdas=array(0=>'id',1=>'nombre',2=>'imagen',3=>'categoria',4=>'orden');
			$pez=" where perfil_index.nombre like '%" . $criterio . "%' or perfil_index.distrito like '%" . $criterio . "%' or perfil_index.descripcion like '%" . $criterio . "%' or perfil_categoria.nombre like '%" . $criterio . "%' or perfil_index.imagen like '%" . $criterio . "%'";
			$set='if_perfil_a.php';
			$ruta='bus_perfil.php';
			$borra=1;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>