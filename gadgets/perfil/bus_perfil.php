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
		$ruta='bus_perfil.php';
	}
?>
<h1>Edita perfil</h1>
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
			mysql_query('set @numero=0');
			$sql = "SELECT @numero:=@numero+1 AS orden,perfil_index.nombre,perfil_index.imagen,perfil_categoria.nombre,perfil_index.orden,perfil_index.id FROM perfil_index INNER JOIN perfil_categoria ON perfil_index.categoria = perfil_categoria.id  ";
			$celdas=array(0=>'id',1=>'nombre',2=>'imagen',3=>'categoria',4=>'orden');
			$pez=" where perfil_index.nombre like '%" . $criterio . "%' or perfil_index.nacido like '%" . $criterio . "%' or perfil_index.descripcion like '%" . $criterio . "%' or perfil_categoria.nombre like '%" . $criterio . "%' or perfil_index.imagen like '%" . $criterio . "%'";
			$set='if_perfil_a.php';
			$ruta='bus_perfil.php';
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