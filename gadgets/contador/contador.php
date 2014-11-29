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
if(isset($_GET['pez'])){
	$pez = $_GET['pez'];
}else{
	$pez='';
}
if(isset($_GET['ruta'])){
	$ruta = $_GET['ruta'];
}
	if(empty($ruta)){
		$ruta='contador.php';
	}
?>
	<div style="margin: 0px auto">
<?php
			include_once("classes/sacar.class.php");
			$self=sacar($_SERVER['PHP_SELF'],"admin/",".php");	
			include_once("classes/buscador_ip.class.php");
			$sql = "SELECT id,ip,fecha,hora FROM contador ";
			$celdas=array(0=>'id',1=>'ip',2=>'fecha',3=>'hora');
//			$pez=" where titulo like '%" . $criterio . "%' or subtitulo like '%" . $criterio . "%' or contenido like '%" . $criterio . "%'";
			$set='http://www.elhacker.net/geolocalizacion.html?host=';
			$ruta='contador.php';
			$borra=1;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>