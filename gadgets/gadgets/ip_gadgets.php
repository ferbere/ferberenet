<?php
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_POST['cuenta'])){
	$cuenta=$_POST['cuenta'];
}
if(isset($_POST['gadget'])){
	$gadget=$_POST['gadget'];
}
if(isset($_POST['alias'])){
	$alias=$_POST['alias'];
}
if(isset($_POST['rutas'])){
	$rutas=$_POST['rutas'];
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
//echo $chain.'<br>';
$privilegios=bindec($chain);
//echo $privilegios;

$mysql=mysql_query("INSERT INTO gadgets_index (gadget,ruta,alias,privilegios) VALUES ('{$gadget}','{$rutas}','{$alias}','{$privilegios}')",$link);
	if(!$mysql){
		die ("Pos no se capturó el contenido, parece que: " .mysql_error());
	}else{
		echo '<script>window.location.href="../../gadgets.php?ruta=if_gadgets.php&capturado=1";</script>';
	}
?>