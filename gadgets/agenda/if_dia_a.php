<?php
session_start();
include("library/confirm.php");
if($_SESSION['privilegioss']=="ferbere"){
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
		$link=Conectarse();
		if(isset($_GET['rubro'])){
			$rubro=$_GET['rubro'];
		}
?>
<div id="form-main">
			<form method="post" action="gadgets/agenda/ip_dia_a.php">
	<div id="maincontent-tit">
		Modificar fecha<br><br>
	</div>
		<div id="maincontent-body">
			<div id="a">
<?php
	$sql=mysql_query("SELECT id,fecha,congreso FROM agenda_dia WHERE id = '$rubro' ",$link);
	while($row=mysql_fetch_array($sql)){
		$id 		=	$row[0];
		$fecha 		=	$row[1];
		$congreso 	=	$row[2];
	}
?>
				<div id="a1">
		fecha:<br>
		<input type="text" name="fecha" value="<?php echo $fecha ?>"><br>
				</div>
			</div>
			<div id="b">
				<div id="b1">
		<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
		<input type="submit"  value="enviar"><br><br>
			</form>
				</div>
		</div>
</div>
<?
}else{
	echo "El contenido ha sido capturado, debidamente. Â¡Muy bien!";
}
}else{
echo "Usted no tiene acceso a esta sección";
}
?>
