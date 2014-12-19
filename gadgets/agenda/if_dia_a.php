<?php
session_start();
include("../library/confirm.php");
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
			<form method="post" action="gadgets/congreso/ip_dia_a.php">
	<div id="maincontent-tit">
		Modificar nombre del día<br><br>
	</div>
		<div id="maincontent-body">
			<div>
<?php
	$sql=mysql_query("SELECT * FROM congreso_dia WHERE id = '$rubro' ",$link);
	while($row=mysql_fetch_array($sql)){
		$nombre=$row['nombre'];
	}
?>
		Nombre:<br>
		<input type="text" name="nombre" style="width:400px" value="<?php echo $nombre ?>"><br>
<br><br>
		<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
			</div>
				<div>
					<input type="submit"  value="enviar"><br><br>
			</form>
				</div>
		</div>
</div>
<?
}else{
	echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
}
}else{
echo "Usted no tiene acceso a esta sección";
}
?>
