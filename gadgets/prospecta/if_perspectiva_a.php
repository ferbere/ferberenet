<?php
session_start();
include("library/confirm.php");
if(($_SESSION['privilegioss']=="ferbere")||($_SESSION['privilegioss']=="admin")){
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
			<form method="post" action="gadgets/prospecta/ip_perspectiva_a.php">
			<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
<?php
$sql= mysql_query("SELECT id,nombre,visible FROM prospecta_perspectiva WHERE id = '$rubro' ",$link);
while ($row = mysql_fetch_array($sql)){
	$id=$row[0];
	$nombre=$row[1];
	$visible=$row[2];
?>
	<div id="maincontent-tit">
		Editar perspectiva
	</div>
		<div id="maincontent-body">
			<div>
					Nombre
				<input type="text" name="nombre" width="100%" value="<?php echo $row[1] ?>" /><br><br>
<?php
	if($row['visible']==0){
		$publino="checked";
		$publisi="nain";
	}elseif($row['visible']==1){
		$publino="nain";
		$publisi="checked";
	}
?>
					Visible:<br>
					Sí <input type="radio" name="visible" value="1" size="30" <?php echo $publisi ?>>
					No <input type="radio" name="visible" value="0" size="30" <?php echo $publino ?>><br><br>
					</div>
						<div>
							<input type="submit"  value="enviar">
							</form>
						</div>

<?php
	}
?>
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
