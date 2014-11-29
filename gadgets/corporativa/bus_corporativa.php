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
		$ruta='bus_corporativa.php';
	}
?>
<div align="center">
	<form action="corporativa.php" method="get">
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
			$sql = "SELECT corporativa_index.id,corporativa_index.titulo,general_visible.nombre FROM corporativa_index INNER JOIN general_visible ON corporativa_index.publicado = general_visible.id ";
			$celdas=array(0=>'id',1=>'titulo',2=>'publicado');
			$pez=" where corporativa_index.titulo like '%" . $criterio . "%' or corporativa_index.subtitulo like '%" . $criterio . "%' or corporativa_index.contenido like '%" . $criterio . "%' or corporativa_index.imagen like '%" . $criterio . "%'";
			$set='if_corporativa_a.php';
			$ruta='bus_corporativa.php';
			$borra=1;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>