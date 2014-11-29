
<?php
include_once('../../../classes/conex.php');
$link=Conectarse();

if(isset($_POST['ruta'])){
	$ruta=$_POST['ruta'];
}
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
$sql_alto=mysql_query("SELECT id FROM mails_massive_mensajes ORDER BY id DESC LIMIT 1",$link);
$row_alto=(mysql_fetch_array($sql_alto));
$alto=$row_alto['id']+1;

$sql=mysql_query("INSERT INTO mails_massive_mensajes (titulo,mensaje,grupo) VALUES ('{$titulo}','{$mensaje}','{$grupo}')", $link);
if(!$sql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../mensajes.php?ruta=if_massive_mail_a.php&rubro='.$alto .'"</script>';
}

?>
