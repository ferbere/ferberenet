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
		$ruta='bus_noticias.php';
	}
?>
<h1>Edita noticias</h1>
<div align="center">
	<form action="noticias.php" method="get">
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
			$sql = "SELECT @numero:=@numero+1 AS orden,noticias_index.titulo,noticias_index.fecha,noticias_categoria.nombre,noticias_index.imagen,general_visible.nombre,noticias_index.orden,noticias_index.id FROM noticias_index INNER JOIN noticias_categoria ON noticias_index.categoria = noticias_categoria.id INNER JOIN general_visible ON noticias_index.publicado = general_visible.id ";
			$celdas=array(0=>'id',1=>'titulo',2=>'fecha',3=>'categoría',4=>'imagen',5=>'publicado',6=>'orden');
			$pez=" where noticias_index.titulo like '%" . $criterio . "%' or noticias_index.subtitulo like '%" . $criterio . "%' or noticias_index.contenido like '%" . $criterio . "%' or noticias_categoria.nombre like '%" . $criterio . "%'";
			$set='if_noticias_a.php';
			$ruta='bus_noticias.php';
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