<?php
session_start();
if($_SESSION["privilegioss"]=="ferbere"){
include("library/confirm.php");
if(isset($_GET['capturado'])){
	$capturado=$_GET['capturado'];
}
if(isset($_GET['rubro'])){
	$rubro=$_GET['rubro'];
}

if(empty($capturado)){
	$sql_botones_admin=mysql_query("SELECT * FROM gadgets_botones_admin WHERE id = '$rubro' ",$link);
	while($row_botones_admin=mysql_fetch_array($sql_botones_admin)){
		$boton=$row_botones_admin['boton'];
		$imagen=$row_botones_admin['imagen'];
		$ext=$row_botones_admin['ext'];
		$ruta=$row_botones_admin['ruta'];
		$gadget=$row_botones_admin['gadget'];
		$privilegios=$row_botones_admin['privilegios'];
		$visible=$row_botones_admin['visible'];
	}
?>
<table border="0" cellpadding="0" width="600" align="center">
<form method="post" action="gadgets/gadgets/ip_botones_admin_a.php">
<tr><td colspan="2"><h1>Editar Botones del Admin</h1></td></tr>
<tr><td colspan="2">Botón:<br><input type="text" name="boton" size="30" value="<?php echo $boton; ?>"></td></tr>
<tr><td>Imagen:<br><input type="text" name="imagen" size="30" value="<?php echo $imagen; ?>"></td>
<?php
	if($ext=='jpg'){
		$opjpg='selected';
		$oppng='nain';
	}elseif($ext=='png'){
		$opjpg='nain';
		$oppng='selected';
	}
?>
<td>Extensión  <select name="ext">
<option value="jpg" <?php echo $opjpg ?>>.jpg</a>
<option value="png" <?php echo $oppng ?>>.png</a>
</select>
</td></tr>
<tr><td>Ruta:<br><input type="text" name="ruta" size="60" value="<?php echo $ruta; ?>">
</td></tr>
<tr>
<td>Gadget:  <select name="gadget">
<?php
$sql2=mysql_query("SELECT id,gadget FROM gadgets_index" ,$link);
while ($row2=mysql_fetch_array($sql2)){
	if($gadget==$row2['id']){
		$hig='selected';
	}else{
		$hig='nain';
	}
echo '<option value="'.$row2['id'].'"'.$hig.'>'."\n".$row2['gadget']."</a>   ";
}
?>
</select>

</td>
</tr>
<tr>
<td>Privilegios:  <select name="privilegios">
<?php
$sql3=mysql_query("SELECT id,nombre FROM usuario_privilegios" ,$link);
while ($row3=mysql_fetch_array($sql3)){
	if($privilegios==$row3['id']){
		$hig_p='selected';
	}else{
		$hig_p='nain';
	}
echo '<option value="'.$row3['id'].'"'.$hig_p.'>'."\n".$row3['nombre']."</a>   ";
}
?>
</select>

</td>
</tr>
<tr><td>
	Visible:<br>
<?php
if($visible==1){
	$viSi='checked';
	$viNo='';
}else{
	$viSi='';
	$viNo='checked';	
}
?>
Sí <input	type="radio" name="visible" value="1"<?php echo $viSi; ?>>
No <input	type="radio" name="visible" value="0"<?php echo $viNo; ?>><br><br>
</td></tr>
<tr><td valign="bottom">
	<input type="hidden" name="rubro" value="<?php echo $rubro; ?>">
	<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar"></form></td>
<td></td></tr>
</table>
<?php
}else{
	echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
}
}else{
echo "Usted no tiene acceso a esta seccción";
}
?>