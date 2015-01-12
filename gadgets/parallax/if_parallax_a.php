<?php
session_start();
include("library/confirm.php");
include_once("classes/mysql.php");
if($_SESSION['privilegioss']=="ferbere"){
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
		$mysql=new MySQL();
		$mysql2=new MySQL();
		if(isset($_GET['rubro'])){
			$rubro=$_GET['rubro'];
		}
?>
		<div id="form-main">
			<form method="post" action="gadgets/parallax/ip_parallax_a.php">
			<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
<?php
$sql= $mysql->consulta("SELECT id,nombre,user,visible,ruta FROM parallax_index WHERE id = '$rubro' ");
while ($row=$mysql->fetch_array($sql)){
	$id=$row[0];
	$nombre=$row[1];
	$user=$row[2];
	$visible=$row[3];
	$ruta=$row[4];
}
?>
	<div id="maincontent-tit">
		Editar sitio
	</div>
		<div id="maincontent-body">
			<div>
					Nombre<br>
				<input type="text" name="nombre" style="width:95%" value="<?php echo $nombre ?>" />
					Ruta:<br>
				<input type="text" name="ruta" style="width:95%" value="<?php echo $ruta ?>" />
					<br><br>
						Usuarios: <br>
<?php
$privv= decbin($user);
/*
echo $user.'<br>';
echo $privv.'<br><br>';*/
$sql_usr=$mysql2->consulta("SELECT nombre FROM usuario_index ORDER BY id DESC");
$cuenta=$mysql2->num_rows($sql_usr);

$privv_def=str_pad($privv,$cuenta,'0',STR_PAD_LEFT);

echo '<br>';
$h=$cuenta;
$j=1;
while($row_usr=$mysql2->fetch_array($sql_usr)){
	if($privv_def{$j-1}==1){
		$high='checked';
	}else{
		$high='nain';
	}
	echo '<input type="checkbox" name="user[]" value="'.$j.'"'.$high.'>'.$row_usr[0].'  ';
	$h=$h-1;
	$j=$j+1;
}
?><br><br>
					<input type="hidden" name="cuenta" value="<?php echo $cuenta ?>">

<?php
	if($visible==0){
		$publino="checked";
		$publisi="nain";
	}elseif($visible==1){
		$publino="nain";
		$publisi="checked";
	}
?>
					visible:<br>
					Sí <input type="radio" name="visible" value="1" size="30" <?php echo $publisi ?>>
					No <input type="radio" name="visible" value="0" size="30" <?php echo $publino ?>>
					</div>
						<div>
							<input type="submit"  value="enviar">
							</form>
						</div>
				</div>
	</div>
<?
}else{
	echo "El contenido ha sido capturado, debidamente. ?Muy bien!";
}
}else{
echo "Usted no tiene acceso a esta secci?n";
}
?>
