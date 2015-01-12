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
		$ruta='bus_answ.php';
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
			$sql = "SELECT quiz_answ.id,quiz_answ.respuesta,quiz_answ.valida,quiz_ques.pregunta FROM quiz_answ INNER JOIN quiz_ques ON quiz_answ.ques = quiz_ques.id";
			$celdas=array(0=>'id',1=>'respuesta',2=>'valida',3=>'quiz');
			$pez=" where (quiz_answ.respuesta like '%" . $criterio . "%' or quiz_ques.pregunta like '%" . $criterio . "%') AND quiz_answ.id > 0 ";
			$set='if_answ_a.php';
			$ruta='bus_answ.php';
			$borra=2;
			$clPag = new paginacion();
			$clPag->cuantos($sql,$pez);
			$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
			$clPag->pie($pag,$sql,$pez,$self);
?>
	</div>