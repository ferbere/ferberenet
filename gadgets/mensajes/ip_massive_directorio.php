<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
$nombre=$_POST['nombre'];
$email=$_POST['email'];
$grupo=$_POST['grupo'];
$telefono_celular=$_POST['telefono_celular'];
$telefono_particular=$_POST['telefono_particular'];
$telefono_trabajo=$_POST['telefono_trabajo'];
$mysql=mysql_query("INSERT INTO mails_massive_directorio (nombre,email,grupo,telefono_celular,telefono_particular,telefono_trabajo) values ('{$nombre}','{$email}','{$grupo}','{$telefono_celular}','{$telefono_particular}','{$telefono_trabajo}')",$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../mensajes.php?ruta=if_massive_directorio.php&capturado=1";</script>';
}
?>