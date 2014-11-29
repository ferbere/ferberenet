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
		$ruta='bus_publicaciones.php';
	}
?>
<div align="center">
	<form action="publicaciones.php" method="get">
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
			$sql = "SELECT publicaciones_index.id,publicaciones_index.titulo,publicaciones_index.genero,publicaciones_index.editor,general_visible.nombre,publicaciones_index.year FROM publicaciones_index INNER JOIN general_visible ON publicaciones_index.publicado = general_visible.id";
			$celdas=array(0=>'id',1=>'titulo',2=>'genero',3=>'editor',4=>'publicado',5=>'year');
			$pez=" where titulo like '%" . $criterio . "%' or genero like '%" . $criterio . "%' or editor like '%" . $criterio . "%'";
			$set='if_publicaciones_a.php';
			$ruta='bus_publicaciones.php';
			$borra=1;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>