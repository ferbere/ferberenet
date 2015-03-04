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
		$ruta='bus_propuesta.php';
	}
?>
<h1>Edita propuesta</h1>
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
			mysql_query('set @numero=0');
			include_once("classes/buscador.class.php");
			$sql = "SELECT @numero:=@numero+1 AS orden,propuesta_index.nombre,propuesta_categoria.nombre,general_visible.nombre,propuesta_index.id FROM propuesta_index INNER JOIN propuesta_categoria ON propuesta_index.categoria = propuesta_categoria.id INNER JOIN general_visible ON propuesta_index.visible = general_visible.id WHERE propuesta_index.id != 0 ";
			$celdas=array(0=>'id',1=>'nombre',2=>'categoria',3=>'visible');
			$pez=" and propuesta_index.nombre like '%" . $criterio . "%' or propuesta_index.texto like '%" . $criterio . "%' or propuesta_categoria.nombre like '%" . $criterio . "%'";
			$set='if_propuesta_a.php';
			$order=' ORDER BY orden DESC LIMIT ';
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