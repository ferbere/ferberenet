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
		$ruta='bus_banner.php';
	}
?>
<div align="center">
	<form action="banners.php" method="get">
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
			include_once("classes/buscador_banners.class.php");
			$sql = "SELECT banners_index.id,banners_index.nombre,banners_dir.nombre,banners_index.orden,banners_index.visible,banners_index.imagen,general_orientacion.nombre FROM banners_index INNER JOIN banners_dir ON banners_index.banner = banners_dir.id INNER JOIN general_orientacion ON banners_index.orientacion = general_orientacion.id ";
			$pez=" where banners_index.nombre like '%" . $criterio . "%' or banners_index.imagen like '%" . $criterio . "%' or banners_dir.nombre like '%" . $criterio . "%' ";
			$set='if_banner_a.php';
			$ruta='bus_banner.php';
			$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
			$url=mysql_fetch_array($sql_u);
			if($url[1]==''){
				$url_d='../'.$_SESSION["admin"].'/images/banners/';
			}else{
				$url_d='http://'.$url[1].'/'.$_SESSION['admin'].'/images/banners/';
			}
			$borra=1;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self,$url_d);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>