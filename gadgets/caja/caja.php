<?php
session_start();
error_reporting(0);
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")||($_SESSION["privilegioss"]=="funcionario")){

include("classes/abre_cierra.class.php");
include_once("classes/caja_gral.class.php");
$caja_estatus=new caja_eStatus();
$cj=$caja_estatus->caja_Es();
//$cr=$caja_estatus->caja_Re();

if(empty($cj)){
	$ct='';
}else{
	$ct=$caja_estatus->caja_Ct();
	$cf=$caja_estatus->caja_Fn();
}
echo $cj;
?>
<table border="0" cellpadding="0" width="600" align="center">
	<tr><td colspan="2"><h1>La caja</h1></td></tr>
	<tr>
		<td>Ingreso total del día</td>
		<td><?php echo "$".number_format($ct,2) ?></td>
	</tr>
	<tr>
		<td>fondo inicial</td>
		<td><?php echo "$".number_format($cf,2) ?></td>
	</tr>
	<tr>
		<td>Total</td>
		<?php $gt=($cf+$ct); ?>
		<td><?php echo "$".number_format($gt,2) ?></td>
	</tr>
	<tr>
		<td colspan="2">
<!--
			<div class="link_s" align="center">
				<a href="javascript:abreC('registro');">Pedidos en tránsito</a>
				<div id="registro" style="display:none;">
					<a href="javascript:cierraA('registro');"> Cerrar</a><br><br>
					<?php	echo $cr; ?>
				</div>
			</div>
-->
			<div class="link_s" align="center">
				<a href="javascript:abreC('registro');">Hacer corte</a>
				<div id="registro" style="display:none;">
					<a href="javascript:cierraA('registro');"> Cerrar</a><br><br>
					<?php include("if_corte.php") ?>
				</div>
			</div>
		</td>
	</tr>
</table>
<?php
}else{
echo "Usted no tiene acceso a esta seccción";
}
?>