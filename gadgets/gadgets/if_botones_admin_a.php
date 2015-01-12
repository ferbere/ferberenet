<?php
session_start();
if($_SESSION["privilegioss"]=="ferbere"){
include("library/confirm.php");
include_once("classes/mysql.php");
$mysql = new MySQL();
$mysql2 = new MySQL();
if(isset($_GET['capturado'])){
	$capturado=$_GET['capturado'];
}
if(isset($_GET['rubro'])){
	$rubro=$_GET['rubro'];
}

if(empty($capturado)){
	$sql_botones_admin=$mysql->consulta("SELECT boton,imagen,ext,ruta,gadget,privilegios,visible FROM gadgets_botones_admin WHERE id = '$rubro' ");
	while($row_botones_admin=$mysql->fetch_array($sql_botones_admin)){
		$boton 			=		$row_botones_admin[0];
		$imagen 		=		$row_botones_admin[1];
		$ext 			=		$row_botones_admin[2];
		$ruta 			=		$row_botones_admin[3];
		$gadget 		=		$row_botones_admin[4];
		$privilegios 	=		$row_botones_admin[5];
		$visible 		= 		$row_botones_admin[6];
	}
?>
<div>
<form method="get" action="gadgets/gadgets/ip_botones_admin_a.php">
	<td colspan="2"><h1>Editar Botones del Admin</h1></div>
	<div>
		Botón:<br><input type="text" name="boton" size="30" value="<?php echo $boton; ?>">
	</div>
	<div>
		Imagen:<br><input type="text" name="imagen" size="30" value="<?php echo $imagen; ?>">
	</div>
<?php
	if($ext=='jpg'){
		$opjpg='selected';
		$oppng='nain';
	}elseif($ext=='png'){
		$opjpg='nain';
		$oppng='selected';
	}
?>
	<div>
		Extensión
		<select name="ext">
			<option value="jpg" <?php echo $opjpg ?>>.jpg</a>
			<option value="png" <?php echo $oppng ?>>.png</a>
		</select>
	</div>
	<div>
		Ruta:<br><input type="text" name="ruta" size="60" value="<?php echo $ruta; ?>">
	</div>
<div>
	<div>Gadget:  <select name="gadget">
	<?php
	$sql2=$mysql->consulta("SELECT id,gadget FROM gadgets_index");
	while ($row2=$mysql->fetch_array($sql2)){
		if($gadget==$row2['id']){
			$hig='selected';
		}else{
			$hig='nain';
		}
	echo '<option value="'.$row2['id'].'"'.$hig.'>'."\n".$row2['gadget']."</a>   ";
	}
	?>
	</select>
	</div>
</div>
<div>
Privilegios: <br>
<?php
$privv= decbin($privilegios);
/*
echo $privilegios.'<br>';
echo $privv.'<br><br>';*/


$sql_privi=$mysql2->consulta("SELECT nombre FROM usuario_privilegios ORDER BY id DESC");
$cuenta=$mysql2->num_rows($sql_privi);
$privv_def=str_pad($privv,$cuenta,'0',STR_PAD_LEFT);
echo '<br>';
$h=$cuenta;
$j=1;
while($row_privi=$mysql2->fetch_array($sql_privi)){
	if($privv_def{$j-1}==1){
		$high='checked';
	}else{
		$high='nain';
	}
	echo '<input type="checkbox" name="privilegios[]" value="'.$j.'"'.$high.'>'.$row_privi[0].'  ';
	$h=$h-1;
	$j=$j+1;
}
?>
</div>
<div>
	Visible:<br>
<?php
if($visible==1){
	$viSi='checked';
	$viNo='';
}elseif($visible==0){
	$viSi='';
	$viNo='checked';	
}
?>
Sí <input	type="radio" name="visible" value="1"<?php echo $viSi; ?>>
No <input	type="radio" name="visible" value="0"<?php echo $viNo; ?>><br><br>
</div>
<div>
	<input type="hidden" name="cuenta" value="<?php echo $cuenta; ?>">
	<input type="hidden" name="rubro" value="<?php echo $rubro; ?>">
	<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar"></form></td>
</div>

<?php
}else{
	echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
}
}else{
echo "Usted no tiene acceso a esta seccción";
}
?>