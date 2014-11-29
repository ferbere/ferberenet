<?php
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_GET['gadget'])){
	$gadget=$_GET['gadget'];
}
if(isset($_GET['rutas'])){
	$rutas=$_GET['rutas'];
}
$mysql=mysql_query("INSERT INTO gadgets_index (gadget,ruta) VALUES ('{$gadget}','{$rutas}')",$link);
	if(!$mysql){
		die ("Pos no se capturó el contenido, parece que: " .mysql_error());
	}else{
		echo '<script>window.location.href="../../gadgets.php?ruta=if_gadgets.php&capturado=1";</script>';
	//	echo $ruta.'<br>'.$gadget.'<br>'.$rutas;
	}

?>