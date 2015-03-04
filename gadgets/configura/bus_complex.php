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
		$ruta='bus_complex.php';
	}
?>
<div align="center">
	<form action="configura.php" method="get">
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
			$sql = "SELECT @numero:=@numero+1 AS orden,template_complex.content,template_complex.orden,general_visible.nombre,template_complex.id FROM template_complex INNER JOIN general_visible ON template_complex.visible = general_visible.id ";
			$celdas=array(0=>'id',1=>'pagina',2=>'orden',3=>'visible');
			$pez=" where template_complex.content like '%" . $criterio . "%' OR general_visible.nombre like '%" . $criterio . "%'";
			$set='if_complex_a.php';
			$ruta='bus_complex.php';
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