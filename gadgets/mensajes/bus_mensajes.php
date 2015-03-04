<?php
if (isset($_GET['pag'])){
	$pag=$_GET['pag'];
}else{
	$pag=0;
}
if(isset($_GET['criterio'])){
	$criterio = $_GET['criterio'];
}
if(isset($_GET['ruta'])){
	$ruta = $_GET['ruta'];
}
	if(empty($ruta)){
		$ruta='bus_mensajes.php';
	}
?>
<h1>Mensajes</h1>
<div align="center">
	<form action="mensajes.php" method="get">
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
			$sql = "SELECT @numero:=@numero+1 AS orden,mails_index.nombre,mails_index.email,mails_index.titulo,mails_status.nombre,mails_index.id FROM mails_index INNER JOIN mails_status ON mails_index.status = mails_status.id WHERE mails_index.id != 0 ";
			$celdas=array(0=>'id',1=>'nombre',2=>'email',3=>'titulo',4=>'status');
			$pez=" and mails_index.nombre like '%" . $criterio . "%' or mails_index.email like '%" . $criterio . "%' or mails_index.titulo like '%" . $criterio . "%' or mails_index.mensaje like '%" . $criterio . "%' or mails_status.nombre like '%" . $criterio . "%'";
			$set='mensaje.php';
			$ruta='bus_mensajes.php';
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