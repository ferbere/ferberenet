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
		$ruta='bus_asigna_boton.php';
	}
?>
<h1>Edita asigna botón</h1>
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
			$sql = "SELECT @numero:=@numero+1 AS orden,perfil_index.nombre,perfil_boton_social.nombre,perfil_asigna_boton.cuenta,perfil_asigna_boton.id FROM perfil_asigna_boton INNER JOIN perfil_index ON perfil_index.id = perfil_asigna_boton.diputado INNER JOIN perfil_boton_social ON perfil_boton_social.id = perfil_asigna_boton.boton_social  WHERE perfil_asigna_boton.id != 0 ";
			$celdas=array(0=>'id',1=>'diputado',2=>'botón social',3=>'cuenta');
			$pez=" and perfil_index.nombre like '%" . $criterio . "%' or perfil_boton_social.nombre like '%" . $criterio . "%' or perfil_asigna_boton.cuenta like '%" . $criterio . "%'";
			$set='if_asigna_boton_a.php';
			$order=' ORDER BY orden DESC LIMIT ';
			$borra=3;
			$clPag = new paginacion($pez,$self);
			$clPag1=$clPag->cuantos($sql);
			$clPag2=$clPag->pagina($pag,$sql,$set,$order,$borra,$celdas);
			$clPag3=$clPag->pie($pag,$sql);
			echo  $clPag1[0];
			echo  $clPag2;
			echo  $clPag3;
?>
	</div>