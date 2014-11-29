<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();

if(isset($_POST['rubro'])){
	$rubro=$_POST['rubro'];	
}
if(isset($_POST['nombre'])){
	$nombre=$_POST['nombre'];	
}
if(isset($_POST['email'])){
	$email=$_POST['email'];
}
if(isset($_POST['grupo'])){
	$grupo=$_POST['grupo'];	
}
if(isset($_POST['telefono_celular'])){
	$telefono_celular=$_POST['telefono_celular'];	
}
if(isset($_POST['telefono_particular'])){
	$telefono_particular=$_POST['telefono_particular'];	
}
if(isset($_POST['telefono_trabajo'])){
	$telefono_trabajo=$_POST['telefono_trabajo'];	
}
if(isset($_POST['invitacion'])){
	$invitacion=$_POST['invitacion'];
}
if(isset($_POST['confirmacion'])){
	$confirmacion=$_POST['confirmacion'];
}

$mysql=mysql_query("UPDATE mails_massive_directorio SET  nombre = '$nombre',email = '$email',grupo = '$grupo',telefono_celular = '$telefono_celular',telefono_particular = '$telefono_particular',telefono_trabajo = '$telefono_trabajo',invitacion = '$invitacion',confirmacion = '$confirmacion' WHERE id = '$rubro'" ,$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../mensajes.php?ruta=if_massive_directorio_a.php&capturado=1";</script>';
}
?>