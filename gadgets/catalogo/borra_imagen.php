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
	$sql=mysql_query("UPDATE catalogo_index SET imagen = '' WHERE id = '$rubro' ", $link);
	if(!$sql){
		die ("Pos no se borró el contenido, parece que: " .mysql_error());
	}else{
		echo 	'<script>window.location.href="../../catalogo.php?ruta=if_catalogo_a.php&rubro='.$rubro.'";</script>';
	}
}elseif($borra==2){
	$sql=mysql_query("UPDATE catalogo_masfotos SET imagen = '' WHERE id = '$rubro' ", $link);
	if(!$sql){
		die ("Pos no se borró el contenido, parece que: " .mysql_error());
	}else{
		echo 	'<script>window.location.href="../../catalogo.php?ruta=if_masfotos_a.php&rubro='.$rubro.'";</script>';
	}
}elseif($borra==3){
	$sql=mysql_query("UPDATE catalogo_categoria SET imagen = '' WHERE id = '$rubro' ", $link);
	if(!$sql){
		die ("Pos no se borró el contenido, parece que: " .mysql_error());
	}else{
		echo 	'<script>window.location.href="../../catalogo.php?ruta=if_categoria_a.php&rubro='.$rubro.'";</script>';
	}
}
?>