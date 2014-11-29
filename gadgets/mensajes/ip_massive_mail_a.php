<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();

if(isset($_POST['rubro'])){
	$rubro=$_POST['rubro'];	
}
if(isset($_POST['titulo'])){
	$titulo=$_POST['titulo'];	
}
if(isset($_POST['mensaje'])){
	$mensaje=$_POST['mensaje'];
}
if(isset($_POST['grupo'])){
	$grupo=$_POST['grupo'];	
}

$mysql=mysql_query("UPDATE mails_massive_mensajes SET  titulo = '$titulo',mensaje = '$mensaje',grupo = '$grupo' WHERE id = '$rubro'" ,$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../mensajes.php?ruta=if_massive_mail_a.php&capturado=1";</script>';
}
?>