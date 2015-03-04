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
		$ruta='bus_articulos.php';
	}
?>
<h1>Edita artículo</h1>
<div align="center">
	<form action="articulos.php" method="get">
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
			$sql = "SELECT @numero:=@numero+1 AS orden,articulos_index.titulo,articulos_index.fecha,articulos_categoria.nombre,articulos_index.imagen,general_visible.nombre,articulos_index.id FROM articulos_index INNER JOIN articulos_categoria ON articulos_index.categoria = articulos_categoria.id INNER JOIN general_visible ON articulos_index.publicado = general_visible.id ";
			$celdas=array(0=>'orden',1=>'titulo',2=>'fecha',3=>'categoría',4=>'imagen',5=>'publicado');
			$pez=" where articulos_index.titulo like '%" . $criterio . "%' or articulos_index.subtitulo like '%" . $criterio . "%' or articulos_index.contenido like '%" . $criterio . "%' or articulos_categoria.nombre like '%" . $criterio . "%'";
			$set='if_articulos_a.php';
			$ruta='bus_articulos.php';
			$order=" ORDER BY id DESC LIMIT ";
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