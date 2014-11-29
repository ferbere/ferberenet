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
		$ruta='bus_massive_mail.php';
	}
?>
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
			$self=sacar($_SERVER['PHP_SELF'],"admin/",".php");	
			include_once("classes/buscador_massive.class.php");
//			$sql = "SELECT id,titulo,enviado,mensaje FROM mails_massive_mensajes ";

			$sql = "SELECT mails_massive_mensajes.id,mails_massive_mensajes.titulo,mails_massive_grupo.nombre,mails_massive_enviados.nombre FROM mails_massive_mensajes INNER JOIN mails_massive_enviados ON mails_massive_mensajes.enviado = mails_massive_enviados.id INNER JOIN mails_massive_grupo ON mails_massive_mensajes.grupo = mails_massive_grupo.id";
			$celdas=array(0=>'id',1=>'titulo',2=>'grupo',3=>'enviado');
			$pez=" where titulo like '%" . $criterio . "%' or mensaje like '%" . $criterio . "%'";
			$set='if_massive_mail_a.php';
			$ruta='bus_massive_mail.php';
			$borra=2;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>