<?php
include_once('../../../classes/conex.php');
$link=Conectarse();
if(isset($_GET["ruta"])){
$ruta=$_GET["ruta"];
}
if(isset($_GET["rubro"])){
$rubro=$_GET["rubro"];
}
if(isset($_GET["titulo"])){
$titulo=$_GET["titulo"];
}
if(isset($_GET["pregunta"])){
$pregunta=$_GET["pregunta"];
}
if(isset($_GET["respuesta"])){
$respuesta=$_GET["respuesta"];
}
if(isset($_GET["categoria"])){
$categoria=$_GET["categoria"];
}
$que=mysql_query("UPDATE faq_index SET titulo = '$titulo', pregunta = '$pregunta', respuesta = '$respuesta',categoria = '$categoria' WHERE id = '$rubro'",$link);
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="faq.php?ruta=if_faq_a.php&rubro='.$rubro.'&capturado=1";</script>';
}
?>