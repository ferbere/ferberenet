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
		$ruta='bus_catalogo.php';
	}
?>
<h1>Edita catálogo</h1>
<div align="center">
	<form action="catalogo.php" method="get">
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
	$sql = "SELECT @numero:=@numero+1 AS orden,catalogo_index.nombre,catalogo_index.imagen,catalogo_categoria.nombre,catalogo_index.existe,catalogo_index.id AS id FROM catalogo_index INNER JOIN catalogo_categoria ON catalogo_index.categoria = catalogo_categoria.id";
	$celdas=array(0=>'orden',1=>'nombre',2=>'imagen',3=>'categoria',4=>'existencias');
	$pez=" where catalogo_index.nombre like '%" . $criterio . "%' or catalogo_index.subnombre like '%" . $criterio . "%' or catalogo_index.descripcion like '%" . $criterio . "%' or catalogo_categoria.nombre like '%" . $criterio . "%' or catalogo_index.imagen like '%" . $criterio . "%'";
	$set='if_catalogo_a.php';
	$ruta='bus_	catalogo.php';
	$order=" ORDER BY orden DESC LIMIT ";
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
</div>