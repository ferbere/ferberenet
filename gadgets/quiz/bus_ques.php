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
	<h1>Editar preguntas del quiz</h1>
	<form action="quiz.php" method="get">
	Criterio de búsqueda:
		<input type="hidden" name="ruta" value="<?php echo $ruta ?>">
		<input type="text" name="criterio">
		<input type="submit" value="Buscar">
	</form>
<?php
//			include_once("../classes/sacar.class.php");
			$self=sacar($_SERVER['PHP_SELF'],"ferberenet/",".php");	
			include_once("classes/buscador.class.php");
			mysql_query('set @numero=0');
			$sql = "SELECT @numero:=@numero+1 AS orden,quiz_ques.pregunta,quiz_index.nombre,quiz_ques.id FROM quiz_ques INNER JOIN quiz_index ON quiz_index.id = quiz_ques.quiz ";
			$celdas=array(0=>'id',1=>'pregunta',2=>'quiz');
			$pez=" where quiz_ques.pregunta like '%" . $criterio . "%' or quiz_index.nombre like '%" . $criterio . "%'";
			$set='if_ques_a.php';
			$ruta='bus_ques.php';
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