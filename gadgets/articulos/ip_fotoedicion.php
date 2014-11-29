<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
if(isset($_POST['ruta'])){
$ruta=$_POST['ruta'];
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
$mysql=mysql_query("INSERT INTO articulos_fotoedicion (imagen, paginas, edicion) VALUES ('{$imagen}', '{$paginas}', {$edicion}) ",$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="../../articulos.php?ruta=if_fotoedicion.php&capturado=1";</script>';
}
?>