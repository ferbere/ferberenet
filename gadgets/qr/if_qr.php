<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
$link=Conectarse();
include("library/tinymce.php");
include("library/confirm.php");
if(isset($_GET['capturado'])){
$capturado=$_GET['capturado'];
}
if(empty($capturado)){
?>
<table width="600" align="center">
	<form method="post" action="gadgets/qr/ip_qr.php">
	<tr>
		<td colspan="2"><h1>Código QR nuevo</h1></td>
	</tr>
	<tr>
		<td colspan="2">
			Nombre: (use guiones en lugar de espacios, y sólo minúsculas)<br>
			<input type="text" name="qr" size="80%"><br>

			URL:<br>
			<input type="url" name="url" size="80%"><br>
			Inserte la url que se traducirá a código QR<br><br>
			Descripción:<br>
			<textarea name="descripcion" rows=19 cols=70 width:300px height:40px></textarea><br>
		</td>
	</tr>
	<tr>
		<td valign="bottom">
			<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
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