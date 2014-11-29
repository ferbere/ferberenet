<?php
include("style/header.html");
require_once("conex.php");
$link=Conectarse();
$titulo=$_POST["titulo"];
$mensaje=$_POST["mensaje"];
$remite=$_POST["remite"];
$dirigido=$_POST["dirigido"];
$correo=$_POST["correo"];
$que=mysql_query("INSERT into mails_mails (titulo,mensaje,remite,dirigido,correo) values ('{$titulo}','{$mensaje}','{$remite}','{$dirigido}','{$correo}') ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="corporativa.php?rubro=14";</script>';
}
include("style/footer.html");
?>