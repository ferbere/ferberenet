<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
$link=Conectarse();
include("../library/tinymce.php");
include("../library/confirm.php");
if(isset($_GET['capturado'])){
$capturado=$_GET['capturado'];
}
if(empty($capturado)){
	$sql=mysql_query("SELECT id,nombre FROM faq_categoria",$link);
?>
<table border="0" cellpadding="0" width="600" align="center">
	<form method="post" action="gadgets/faq/ip_faq.php" name="fvalida">
	<tr>
		<td colspan="3">
			<h1>Agregar FAQ</h1>
		</td>
	</tr>
	<tr>
		<td colspan="3">
			Título:<br>
			<input type="text" name="titulo" size="80%"><br><br>
			Pregunta:<br>
			<textarea name="pregunta" rows=19 cols=80 width:300px height:40px>
			</textarea><br><br>
			Respuesta:<br>
			<textarea name="respuesta" rows=19 cols=80 width:300px height:40px>
			</textarea><br><br>
			Categoría:<br><select name="categoria">
<?php
while ($row=mysql_fetch_array($sql)){
	echo '<option value="'.$row['id'].'">'."\n".$row['nombre']."</a>   ";
}
?>
			</select><br><br>
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