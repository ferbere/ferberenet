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
		$ruta='bus_faq.php';
	}
?>
<h1>Edita faq</h1>
<div align="center">
	<form action="faq.php" method="get">
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
			$sql = "SELECT @numero:=@numero+1 AS orden,faq_index.nombre,general_visible.nombre,faq_index.id FROM faq_index INNER JOIN general_visible ON faq_index.visible = general_visible.id ";
			$celdas=array(0=>'orden',1=>'nombre',2=>'visible');
			$pez=" where faq_index.nombre like '%" . $criterio . "%' or faq_index.pregunta like '%" . $criterio . "%' or faq_index.respuesta like '%" . $criterio . "%'";
			$set='if_faq_a.php';
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