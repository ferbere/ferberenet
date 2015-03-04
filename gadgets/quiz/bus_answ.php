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
<h1>Edita respuesta</h1>
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
			include_once("classes/sacar.class.php");
			$self=sacar($_SERVER['PHP_SELF'],"ferberenet/",".php");	
			include_once("classes/buscador.class.php");
			mysql_query('set @numero=0');
			$sql = "SELECT @numero:=@numero+1 AS orden,quiz_answ.respuesta,general_truefalse.nombre,quiz_ques.pregunta,quiz_answ.id FROM quiz_answ INNER JOIN general_truefalse ON quiz_answ.valida = general_truefalse.id INNER JOIN quiz_ques ON quiz_answ.ques = quiz_ques.id";
			$celdas=array(0=>'id',1=>'respuesta',2=>'válida',3=>'quiz');
			$pez=" where (quiz_answ.respuesta like '%" . $criterio . "%' or quiz_ques.pregunta like '%" . $criterio . "%') AND quiz_answ.id > 0 ";
			$set='if_answ_a.php';
			$ruta='bus_answ.php';
			$order=" ORDER BY quiz_answ.id DESC LIMIT ";
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