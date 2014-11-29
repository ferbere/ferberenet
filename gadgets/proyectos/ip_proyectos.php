<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();
$titulo=$_POST["titulo"];
$cliente=$_POST["cliente"];
$fecha=$_POST["fecha"];
$contenido=$_POST["contenido"];
$publicado=$_POST["publicado"];
$proyecto=$_POST["proyecto"];
$que=mysql_query("INSERT into proyectos_index (titulo,cliente,fecha,contenido,publicado,proyecto) values ('{$titulo}','{$cliente}','{$fecha}','{$contenido}','{$publicado}','{$proyecto}') ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
	echo '<script>window.location.href="../../proyectos.php?ruta=if_proyectos.php&capturado=1";</script>';
}
include("style/footer_admin.html");
?>