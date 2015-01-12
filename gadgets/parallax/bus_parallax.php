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
		$ruta='bus_parallax.php';
	}
?>
<div align="center">
	<form action="parallax.php" method="get">
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
/*			$sql = "SELECT parallax_index.id,parallax_index.nombre,parallax_index.ruta FROM parallax_index INNER JOIN usuario_index ON parallax_index.user = usuario_index.id ";
			$celdas=array(0=>'id',1=>'nombre',2=>'sitio');
			$pez=" where parallax_index.nombre like '%" . $criterio . "%' or parallax_index.ruta like '%" . $criterio . "%' or usuario_index.nombre like '%" . $criterio . "%'";*/

			$sql = "SELECT id,nombre,ruta FROM parallax_index ";
			$celdas=array(0=>'id',1=>'nombre',2=>'sitio');
			$pez=" where nombre like '%" . $criterio . "%' or ruta like '%" . $criterio . "%' or user like '%" . $criterio . "%'";
			$set='if_parallax_a.php';
			$borra=1;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>
