<?php
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_GET['rubro'])){
	$rubro=$_GET['rubro'];
}
$sql=mysql_query("UPDATE banners_index SET imagen = '' WHERE id = '$rubro' ", $link);
if(!$sql){
	die ("Pos no se borró el contenido, parece que: " .mysql_error());
}
echo 	'<script>window.location.href="../../banners.php?ruta=if_banner_a.php&rubro='.$rubro.'";</script>';
?>