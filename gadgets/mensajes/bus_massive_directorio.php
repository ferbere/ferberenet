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
		$ruta='bus_massive_directorio.php';
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
			include_once("classes/buscador.class.php");
			$sql = "SELECT mails_massive_directorio.id,mails_massive_directorio.nombre,mails_massive_directorio.email,mails_massive_grupo.nombre, mails_massive_directorio_invi.nombre,mails_massive_confirmacion.nombre FROM mails_massive_directorio INNER JOIN mails_massive_grupo ON mails_massive_directorio.grupo = mails_massive_grupo.id INNER JOIN mails_massive_directorio_invi ON mails_massive_directorio.invitacion = mails_massive_directorio_invi.id INNER JOIN mails_massive_confirmacion ON mails_massive_directorio.confirmacion = mails_massive_confirmacion.id";
			$celdas=array(0=>'id',1=>'nombre',2=>'e-mail',3=>'grupo',4=>'invitación',5=>'confirmacion');
			$pez=" where mails_massive_directorio.nombre like '%" . $criterio . "%' or mails_massive_directorio.email like '%" . $criterio . "%' or mails_massive_grupo.nombre like '%" . $criterio . "%' or mails_massive_directorio.telefono_celular like '%" . $criterio . "%' or mails_massive_directorio.telefono_particular like '%" . $criterio . "%' or mails_massive_directorio.telefono_trabajo like '%" . $criterio . "%' or mails_massive_directorio_invi.nombre like '%" . $criterio . "%' or mails_massive_confirmacion.nombre like '%" . $criterio . "%'";
			$set='if_massive_directorio_a.php';
			$ruta='bus_massive_directorio.php';
			$borra=4;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>