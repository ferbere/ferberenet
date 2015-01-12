<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_POST['cuenta'])){
	$cuenta=$_POST['cuenta'];
}
if(isset($_POST['boton'])){
	$boton=$_POST['boton'];	
}
if(isset($_POST['imagen'])){
	$imagen=$_POST['imagen'];
}
if(isset($_POST['ext'])){
	$ext=$_POST['ext'];
}
if(isset($_POST['ruta'])){
	$ruta=$_POST['ruta'];
}
if(isset($_POST['gadget'])){
	$gadget=$_POST['gadget'];
}
if(isset($_POST['visible'])){
	$visible=$_POST['visible'];
}
foreach($_POST['privilegios'] as $valor){
	$privilegios[$valor]= 1;
}
for($i=1;$i<=$cuenta;$i++){
	if($privilegios[$i]!=1){
		$privilegios[$i]=0;
	}
	$chain .=$privilegios[$i];
}
//echo $cuenta;
//echo $chain.'<br>';
$privilegios=bindec($chain);
//echo $privilegios;

$mysql=mysql_query("INSERT into gadgets_botones_admin (boton,imagen,ext,ruta,gadget,privilegios,visible) values ('{$boton}','{$imagen}','{$ext}','{$ruta}','{$gadget}','{$privilegios}','{$visible}')",$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="../../gadgets.php?ruta=if_botones_admin.php&capturado=1";</script>';
}
?>