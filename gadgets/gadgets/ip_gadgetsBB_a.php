<?php
include_once('../../classes/conex.php');
$link=Conectarse();
if(isset($_POST['rubro'])){
$rubro=$_POST['rubro'];	
}
if(isset($_POST['gadget'])){
$gadget=$_POST['gadget'];	
}
if(isset($_POST['alias'])){
$alias=$_POST['alias'];	
}
if(isset($_POST['ruta'])){
$ruta=$_POST['ruta'];	
}
if(isset($_POST['visible'])){
$visible=$_POST['visible'];	
}
if(isset($_POST['privilegios'])){
$privilegios=$_POST['privilegios'];	
}
$mysql=mysql_query("UPDATE gadgets_index SET  gadget = '$gadget',alias= '$alias',ruta = '$ruta',visible = '$visible', privilegios = '$privilegios' WHERE id = '$rubro'" ,$link);
if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="../../gadgets.php?ruta=if_gadgets_a.php&capturado=1&rubro='.$rubro.'";</script>';
}
?>