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
		$ruta='bus_content.php';
	}
?>
<div align="center">
	<form action="language.php" method="get">
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
			include_once("classes/buscador_articulos.class.php");
//			$sql = "SELECT id,titulo,subtitulo FROM language_content ";
			$sql = "SELECT language_content.id,language_content.titulo,language_content.subtitulo,language_content.nombre,language_index.nombre,language_content.contenido,language_content.imagen,language_content.secc_vincula FROM language_content INNER JOIN language_index ON language_content.idioma = language_index.id  ";
			$celdas=array(0=>'id',1=>'titulo',2=>'subtitulo',3=>'nombre',4=>'idioma');
			$pez=" where language_content.titulo like '%" . $criterio . "%' or language_content.subtitulo like '%" . $criterio . "%' or language_content.contenido like '%" . $criterio . "%' or language_index.nombre like '%" . $criterio . "%' or language_content.imagen like '%' or language_content.secc_vincula like '%'";
			$set='if_content_a.php';
			$order=" ORDER BY language_content.id ASC LIMIT ";
			$borra=1;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$order,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>