<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();

if(isset($_POST['cuenta'])){
	$cuenta=$_POST['cuenta'];
}
if(isset($_POST['nombre'])){
	$nombre=$_POST['nombre'];
}
if(isset($_POST['visible'])){
	$visible=$_POST['visible'];
}
if(isset($_POST['ruta'])){
	$ruta=$_POST['ruta'];
}

foreach($_POST['user'] as $valor){
	$user[$valor]= 1;
}
for($i=1;$i<=$cuenta;$i++){
	if($user[$i]!=1){
		$user[$i]=0;
	}
	$chain .=$user[$i];
}
//echo $chain.'<br>';
$user=bindec($chain);
//echo $user;

$que=mysql_query("INSERT into parallax_index (nombre,user,visible,ruta) values ('{$nombre}','{$user}','{$visible}','{$ruta}') ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../parallax.php?ruta=if_parallax.php&capturado=1";</script>';
}
?>
