<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
include("library/confirm.php");
if(isset($_GET['capturado'])){
$capturado=$_GET['capturado'];
}
if(empty($capturado)){
?>
	<table border="0" cellpadding="0" width="600" align="center">
	<form method="post" action="gadgets/menus/ip_submenu.php">
	<tr>
		<td colspan="2">
			<h1>Agregar Submenú</h1>
		</td>
	</tr>
		<tr>
			<td colspan="2">
				Nombre:<br><input type="text" name="nombre" size="30">
			</td>
		</tr>
		<tr>
			<td valign="bottom">
				<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
</form>
				</td>
					<td>
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