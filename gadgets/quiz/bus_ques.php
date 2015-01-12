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
		$ruta='bus_ques.php';
	}
?>
<div align="center">
	<form action="quiz.php" method="get">
	Criterio de búsqueda:
		<input type="hidden" name="ruta" value="<?php echo $ruta ?>">
		<input type="text" name="criterio" size="22" maxlength="150">
		<input type="submit" value="Buscar">
	</form>
</div>
	<div style="margin: 0px auto">
<?php
//			include_once("../classes/sacar.class.php");
			$self=sacar($_SERVER['PHP_SELF'],"ferberenet/",".php");	
			include_once("classes/buscador.class.php");
			$sql = "SELECT quiz_ques.id,quiz_ques.pregunta,quiz_index.nombre FROM quiz_ques INNER JOIN quiz_index ON quiz_index.id = quiz_ques.quiz ";
			$celdas=array(0=>'id',1=>'pregunta',2=>'quiz');
			$pez=" where quiz_ques.pregunta like '%" . $criterio . "%' or quiz_index.nombre like '%" . $criterio . "%'";
			$set='if_ques_a.php';
			$ruta='bus_ques.php';
			$borra=2;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>