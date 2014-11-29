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
			<form method="post" action="gadgets/congreso/ip_imparte_a.php">
	<div id="maincontent-tit">
		Modificar información del Ponente<br><br>
	</div>
		<div id="maincontent-body">
			<div>
<?php
	$sql=mysql_query("SELECT * FROM imparte WHERE id = '$rubro' ",$link);
	while($row=mysql_fetch_array($sql)){
		$imparte=$row['imparte'];
		$perfil=$row['perfil'];
		$curri=$row['curri'];
	}
?>
		Ponente:<br>
		<input type="text" name="imparte" style="width:400px" value="<?php echo $imparte ?>"><br>
		Perfil:<br>
		<input type="text" name="perfil" style="width:400px" value="<?php echo $perfil ?>"><br><br>
		Ficha curricular:<br>
		<textarea name="curri" rows=19 cols=70 width:300px height:40px><?php echo $curri; ?></textarea><br><br>
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
