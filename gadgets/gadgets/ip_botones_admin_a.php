<?php
session_start();
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_POST['rubro'])){
	$rubro=$_POST['rubro'];
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
if(isset($_POST['privilegios'])){
	$privilegios=$_POST['privilegios'];
}
if(isset($_POST['visible'])){
	$visible=$_POST['visible'];
}
$mysql=mysql_query("UPDATE gadgets_botones_admin SET boton='$boton', imagen='$imagen', ext='$ext', ruta='$ruta', gadget='$gadget', privilegios='$privilegios', visible='$visible' WHERE id = '$rubro'", $link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../gadgets.php?ruta=if_botones_admin.php&capturado=1";</script>';
}
include("style/footer_admin.html");
?>