<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")||($_SESSION["privilegioss"]=="caja")){
$link=Conectarse();
include("library/confirm.php");
include_once("classes/caja_gral.class.php");
if(isset($_GET['capturado'])){
	$capturado=$_GET['capturado'];
}
$caja_estatus=new caja_eStatus();
$ce=$caja_estatus->caja_Es();

if(empty($capturado)){
	echo $ec;
?>
<table border="0" cellpadding="0" width="600" align="center">
<form method="post" action="gadgets/caja/ip_abrir.php">
	<tr>
		<td colspan="2">
			<h1>Abrir la caja</h1>
		</td>
	</tr>
	<tr>
		<td>
			Fondo inicial:<br><input type="number" class="rounded search" name="fondo" size="30"><br><br>
		</td>
	</tr>
	<tr>
		<td valign="bottom">
			<input type="submit" class="rounded_min submit" onClick="MM_popupMsg('Guardar');return false" value="continuar">
			</form>
		</td>
	</tr>
</table>
<?php
}else{
	echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
}
}else{
echo "Usted no tiene acceso a esta seccción";
}
?>