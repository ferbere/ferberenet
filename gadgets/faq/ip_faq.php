<?php
session_start();
include_once('../../../classes/conex.php');
$link=Conectarse();

$titulo=$_POST["titulo"];
$pregunta=$_POST["pregunta"];
$respuesta=$_POST["respuesta"];
$categoria=$_POST["categoria"];

$que=mysql_query("INSERT INTO faq_index (titulo,pregunta,respuesta,categoria) values ('{$titulo}','{$pregunta}','{$respuesta}','{$categoria}') ",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo 	'<script>window.location.href="../../faq.php?ruta=if_categoria.php&capturado=1";</script>';
}
?>