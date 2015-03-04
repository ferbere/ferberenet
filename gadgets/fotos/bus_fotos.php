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
		$ruta='bus_fotos.php';
	}
?>
<h1>Editar foto</h1>
<div align="center">
	<form action="fotos.php" method="get">
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
			$sql = "SELECT @numero:=@numero+1 AS orden,fotos_index.nombre,fotos_index.imagen,fotos_categoria.nombre,general_visible.nombre,date_format(fotos_index.fecha,'%d-%m-%Y'),fotos_index.id FROM fotos_index INNER JOIN fotos_categoria ON fotos_index.categoria = fotos_categoria.id INNER JOIN general_visible ON fotos_index.visible = general_visible.id ";
			
			$celdas=array(0=>'id',1=>'nombre',2=>'imagen',3=>'categoria',4=>'visible',5=>'fecha');
			$pez=" where fotos_index.nombre like '%" . $criterio . "%' or fotos_index.subnombre like '%" . $criterio . "%' or fotos_index.descripcion like '%" . $criterio . "%' or fotos_categoria.nombre like '%" . $criterio . "%' or fotos_index.imagen like '%" . $criterio . "%' or fotos_index.fecha like '%" . $criterio . "%'";
			$set='if_fotos_a.php';
			$order=" ORDER BY id LIMIT ";
			$ruta='bus_	fotos.php';
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