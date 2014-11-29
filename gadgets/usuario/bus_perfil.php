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
			$sql = "SELECT usuario_index.id,usuario_index.nombre,usuario_index.imagen,usuario_categoria.nombre FROM usuario_index INNER JOIN usuario_categoria ON usuario_index.categoria = usuario_categoria.id ";
			
			$celdas=array(0=>'id',1=>'nombre',2=>'imagen',3=>'categoria');
			$pez=" where usuario_index.id > 2 AND (usuario_index.nombre like '%" . $criterio . "%' or usuario_index.perfil like '%" . $criterio . "%' or usuario_index.maill like '%" . $criterio . "%' or usuario_categoria.nombre like '%" . $criterio . "%')";
			$set='if_perfil_a.php';
			$ruta='bus_perfil.php';
			$borra=1;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>