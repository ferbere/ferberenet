<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_GET['rubro'])){
	$rubro=$_GET['rubro'];
}
if(isset($_GET['cuenta'])){
	$cuenta=$_GET['cuenta'];	
}
if(isset($_GET['boton'])){
	$boton=$_GET['boton'];
}
if(isset($_GET['imagen'])){
	$imagen=$_GET['imagen'];
}
if(isset($_GET['ext'])){
	$ext=$_GET['ext'];
}
if(isset($_GET['ruta'])){
	$ruta=$_GET['ruta'];
}
if(isset($_GET['gadget'])){
	$gadget=$_GET['gadget'];
}
if(isset($_GET['visible'])){
	$visible=$_GET['visible'];
}

foreach($_GET['privilegios'] as $valor){
	$privilegios[$valor]= 1;
}
for($i=1;$i<=$cuenta;$i++){
	if($privilegios[$i]!=1){
		$privilegios[$i]=0;
	}
	$chain .=$privilegios[$i];
}
//echo $chain.'<br>';
$privilegios=bindec($chain);
//echo $privilegios;
$mysql=mysql_query("UPDATE gadgets_botones_admin SET boton='$boton', imagen='$imagen', ext='$ext', ruta='$ruta', gadget='$gadget', privilegios='$privilegios', visible='$visible' WHERE id = '$rubro'", $link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../gadgets.php?ruta=if_botones_admin.php&capturado=1";</script>';
}
?>