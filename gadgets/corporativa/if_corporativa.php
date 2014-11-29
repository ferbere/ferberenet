<?php
session_start();
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
	<div id="form-main">
		<form method="post" action="gadgets/corporativa/ip_corporativa.php" name="fvalida" enctype="multipart/form-data">
	   	 <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
<tr><td colspan="3"><h1>Agregar información Corporativa</h1></td></tr>
<tr><td colspan="3">Título:<br><input type="text" name="titulo" size="80%"><br>
Subtítulo:<br><input type="text" name="subtitulo" size="80%"><br></td></tr>
<tr><td>
Imagen:<input type="file" name="imagen" >
	</td>
		<td>

	</td>
</tr>
<tr><td colspan="3">Contenido:<br><textarea name="contenido" rows=19 cols=80 width:300px height:40px></textarea><br></td></tr>
<tr><td>
Publicado:<br>Sí <input type="radio" name="publicado" value="1" size="30">
No <input type="radio" name="publicado" value="0" size="30" checked></td>
</select>

</td>
</tr>
<td valign="bottom"><input type="submit" value="enviar"></form></td>
<td colspan="2"></td></tr>
</table>
<?php
}else{
	echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
}
}else{
echo "Usted no tiene acceso a esta seccción";
}
?>