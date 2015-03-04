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
		$ruta='bus_botones.php';
	}
?>
<div align="center">
	<form action="menus.php" method="get">
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
			mysql_query('set @numero=0');
			$sql = "SELECT @numero:=@numero+1 AS orden,menus_botones.nombre,menus_botones.ruta,menus_posicion.nombre,menus_submenu.nombre,menus_botones.id FROM menus_botones INNER JOIN menus_posicion ON menus_botones.posicion = menus_posicion.id INNER JOIN menus_submenu ON menus_botones.submenu = menus_submenu.id";
			$celdas=array(0=>'id',1=>'nombre',2=>'ruta',3=>'posicion',4=>'submenu');
			$pez=" where menus_botones.nombre like '%" . $criterio . "%' or menus_botones.ruta like '%" . $criterio . "%' or menus_posicion.nombre like '%" . $criterio . "%' or menus_submenu.nombre like '%".$criterio."%' ";
			$set='if_botones_a.php';
			$ruta='bus_botones.php';
			$order=' ORDER BY orden ASC LIMIT ';
			$borra=1;
			$clPag = new paginacion($pez,$self);
			$clPag1=$clPag->cuantos($sql);
			$clPag2=$clPag->pagina($pag,$sql,$set,$order,$borra,$celdas);
			$clPag3=$clPag->pie($pag,$sql);
			echo  $clPag1[0];
			echo  $clPag2;
			echo  $clPag3;
?>
	</div>