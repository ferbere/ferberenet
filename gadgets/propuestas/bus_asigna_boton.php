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
		$ruta='bus_asigna_boton.php';
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
			$sql = "SELECT perfil_asigna_boton.id,perfil_index.nombre,perfil_boton_social.nombre,perfil_asigna_boton.cuenta FROM perfil_asigna_boton INNER JOIN perfil_index ON perfil_index.id = perfil_asigna_boton.diputado INNER JOIN perfil_boton_social ON perfil_boton_social.id = perfil_asigna_boton.boton_social  WHERE perfil_asigna_boton.id != 0 ";
			$celdas=array(0=>'id',1=>'diputado',2=>'botón social',3=>'cuenta');
			$pez=" and perfil_index.nombre like '%" . $criterio . "%' or perfil_boton_social.nombre like '%" . $criterio . "%' or perfil_asigna_boton.cuenta like '%" . $criterio . "%'";
			$set='if_asigna_boton_a.php';
			$borra=6;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>