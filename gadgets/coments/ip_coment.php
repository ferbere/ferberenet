<?php
session_start();
include("style/header_admin.html");
$link=Conectarse();

//$categoria=$_POST["categoria"];
$relativo=$_POST["relativo"];
$titulo=$_POST["titulo"];
$remite=$_POST["remite"];
$correo=$_POST["correo"];
$comentario=$_POST["comentario"];
$fecha=$_POST["fecha"];
$que=mysql_query("INSERT into coment (titulo,remite,correo,comentario,relativo) values ('{$titulo}','{$remite}','{$correo}','{$comentario}','{$relativo}') ",$link);
if(!$que){die ("Pos no se capturó su mensaje, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="'.$_SERVER['HTTP_REFERER'].'?capturado=1";</script>';
}
include("style/footer_admin.html");
?>