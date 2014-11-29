<?php
session_start();
include("style/header_admin.html");
$link=Conectarse();

if(isset($_POST['user'])){
$user=addslashes(trim($_POST['user']));
}
if(isset($_POST['passwd'])){
$passwd=md5(addslashes(trim($_POST['passwd'])));
}
if(isset($_POST['maill'])){
$maill=($_POST['maill']);
}
if(isset($_POST['nombre'])){
$nombre=($_POST['nombre']);
}
if(isset($_POST['domicilio'])){
$domicilio=($_POST['domicilio']);
}
if(isset($_POST['poblacion'])){
$poblacion=($_POST['poblacion']);
}
if(isset($_POST['telefono'])){
$telefono=($_POST['telefono']);
}
if(isset($_POST['celular'])){
$celular=($_POST['celular']);
}
$mysql=mysql_query("INSERT INTO user (user,passwd,maill,nombre,domicilio,poblacion,telefono,celular) values ('{$user}','{$passwd}','{$maill}','{$nombre}','{$domicilio}','{$poblacion}','{$telefono}','{$celular}')",$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="'.$_SERVER['HTTP_REFERER'].'?capturado=1";</script>';
}
include("style/footer_admin.html");
?>