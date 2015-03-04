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
		$ruta='bus_botones_admin.php';
	}
?>
<h1>Edita botón del admin</h1>
<div align="center">
	<form action="gadgets.php" method="get">
	Criterio de búsqueda:
		<input type="hidden" name="ruta" value="<?php echo $ruta ?>">
		<input type="text" name="criterio" size="22" maxlength="150">
		<input type="submit" value="Buscar">
	</form>
</div>
	<div style="margin: 0px auto">
<?php
//			include_once("../classes/sacar.class.php");
			$self=sacar($_SERVER['PHP_SELF'],"ferberenet/",".php");
			include_once("classes/buscador.class.php");
			mysql_query('set @numero=0');
			$sql = "SELECT @numero:=@numero+1 AS orden,gadgets_botones_admin.boton,gadgets_botones_admin.imagen,gadgets_botones_admin.ruta,gadgets_index.gadget,general_visible.nombre,gadgets_botones_admin.id FROM gadgets_botones_admin INNER JOIN gadgets_index ON gadgets_botones_admin.gadget = gadgets_index.id INNER JOIN general_visible ON gadgets_botones_admin.visible = general_visible.id ";

			$celdas=array(0=>'id',1=>'boton',2=>'imagen',3=>'ruta',4=>'gadget',5=>'visible');
			$pez=" where gadgets_botones_admin.imagen like '%" . $criterio . "%' or gadgets_botones_admin.boton like '%" . $criterio . "%' or gadgets_botones_admin.ruta like '%" . $criterio . "%' or gadgets_index.gadget like '%" . $criterio . "%'";
			$set='if_botones_admin_a.php';
			$ruta='bus_botones_admin.php';
			$order=" ORDER BY id DESC LIMIT ";
			$borra=2;
			$clPag = new paginacion($pez,$self);
			$clPag1=$clPag->cuantos($sql);
			$clPag2=$clPag->pagina($pag,$sql,$set,$order,$borra,$celdas);
			$clPag3=$clPag->pie($pag,$sql);
			echo  $clPag1[0];
			echo  $clPag2;
			echo  $clPag3;
?>
	</div>