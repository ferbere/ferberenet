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
			<form method="post" action="gadgets/agenda/ip_imparte_a.php">
	<div id="maincontent-tit">
		Modificar información del Ponente<br><br>
	</div>
		<div id="maincontent-body">
			<div id="a">
<?php
	$sql=mysql_query("SELECT nombre,perfil,curri FROM agenda_imparte WHERE id = '$rubro' ",$link);
	while($row=mysql_fetch_array($sql)){
		$nombre 	= 	$row[0];
		$perfil 	=	$row[1];
		$curri 		=	$row[2];
	}
?>
			<div id="a1">
		Ponente:<br>
		<input type="text" name="nombre" value="<?php echo $nombre ?>">
			</div>
		</div>
		<div id="b">
			<div id="b1">
		Perfil:<br>
		<input type="text" name="perfil" value="<?php echo $perfil ?>">
			</div>
		</div>
		<div id="c">
			<div id="c1">
		Ficha curricular:<br>
		<textarea name="curri" rows=19 cols=70 width:300px height:40px><?php echo $curri; ?></textarea><br><br>
		<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
			</div>
		</div>
			<div id="d">
				<div id="d1">
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
