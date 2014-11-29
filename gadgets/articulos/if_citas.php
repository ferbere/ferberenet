<?php
session_start();
include("style/header_admin.html");
if($_SESSION["estado"]=="Autenticado"){
$link=Conectarse();
include("library/tinymce.php");
include("library/confirm.php");
if(isset($_GET['capturado'])){
$capturado=$_GET['capturado'];
}
if(empty($capturado)){
?>
<table border="0" cellpadding="0" width="600" align="center">
<form method="post" action="ip_citas.php">
<tr><td colspan="2"><h1>Cita nueva</h1></td></tr>
<tr><td colspan="2">Autor:<br><input type="text" name="autor" size="80%"><br>
Contenido:<br><textarea name="contenido" rows=19 cols=70 width:300px height:40px></textarea><br></td></tr>
<tr><td valign="bottom"><input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar"></form></td>
<td></td></tr>
</table>
<?php
}else{
	echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
}
}else{
echo "Usted no tiene acceso a esta seccción";
}
include("style/footer_admin.html"); ?>