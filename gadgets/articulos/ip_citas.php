<?php
session_start();
include("style/header_admin.html");
$link=Conectarse();

$autor=$_POST["autor"];
$contenido=$_POST["contenido"];
$que=mysql_query("INSERT INTO citas (autor,contenido) values ('{$autor}','{$contenido}') ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="'.$_SERVER['HTTP_REFERER'].'?capturado=1";</script>';
}
include("style/footer_admin.html");
?>