<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
if(isset($_POST['rubro'])){
	$rubro=$_POST['rubro'];
}
if(isset($_POST['imagen'])){
	$imagen=$_POST['imagen'];
}
if(isset($_POST['paginas'])){
	$paginas=$_POST['paginas'];
}
if(isset($_POST['edicion'])){
	$edicion=$_POST['edicion'];
}
$mysql=mysql_query("UPDATE articulos_fotoedicion SET imagen='$imagen',paginas='$paginas', edicion='$edicion' WHERE id = '$rubro' ",$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="../../articulos.php?ruta=if_fotoedicion_a.php&capturado=1";</script>';
}
?>