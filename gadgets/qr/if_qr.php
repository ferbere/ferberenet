<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")||($_SESSION["privilegioss"]=="directivo")){
$link=Conectarse();
include("library/tinymce.php");
include("library/confirm.php");
if(isset($_GET['capturado'])){
$capturado=$_GET['capturado'];
}
if(empty($capturado)){
?>
	<form method="post" action="gadgets/qr/ip_qr.php">
		<h1>Código QR nuevo</h1>
		<label>Nombre (use guiones en lugar de espacios, y sólo minúsculas)</label>
		<input type="text" name="qr">
		<label>URL (inserte la url que se traducirá a código QR)</label>
		<input type="text" name="urls">
		<label>Descripción</label>
		<textarea name="descripcion"></textarea>
		<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
	</form>
<?php
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
	echo "Usted no tiene acceso a esta seccción";
}
?>