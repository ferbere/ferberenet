<?php
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_GET['rubro'])){
	$rubro=$_GET['rubro'];
}
if(isset($_GET['borra'])){
	$borra=$_GET['borra'];
}
if($borra==1){
	$sql=mysql_query("UPDATE articulos_index SET imagen = '' WHERE id = '$rubro' ", $link);
	if(!$sql){
		die ("Pos no se borró el contenido, parece que: " .mysql_error());
	}
	echo 	'<script>window.location.href="../../articulos.php?ruta=if_articulos_a.php&rubro='.$rubro.'";</script>';
}elseif($borra==2){
	$sql=mysql_query("UPDATE articulos_categoria SET imagen = '' WHERE id = '$rubro' ", $link);
	if(!$sql){
		die ("Pos no se borró el contenido, parece que: " .mysql_error());
	}
	echo 	'<script>window.location.href="../../articulos.php?ruta=if_categoria_a.php&rubro='.$rubro.'";</script>';
}
?>