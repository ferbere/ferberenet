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
		$ruta='bus_gadgets.php';
	}
?>
<h1>Edita gadget</h1>
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
			include_once("classes/sacar.class.php");
			$self=sacar($_SERVER['PHP_SELF'],"ferberenet/",".php");
			include_once("classes/buscador.class.php");
			mysql_query('set @numero=0');
			$sql = "SELECT @numero:=@numero+1 AS orden,gadgets_index.gadget,gadgets_index.alias,gadgets_index.ruta,general_visible.nombre,gadgets_index.id FROM gadgets_index INNER JOIN general_visible ON gadgets_index.visible = general_visible.id ";
			$celdas=array(0=>'orden',1=>'gadget',2=>'alias',3=>'ruta',4=>'visible');
			$pez=" where gadgets_index.alias like '%" . $criterio . "%' or gadgets_index.gadget like '%" . $criterio . "%' or gadgets_index.ruta like '%" . $criterio . "%'";
			$set='if_gadgets_a.php';
			$order=" ORDER BY orden LIMIT ";
			$ruta='bus_gadgets.php';
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