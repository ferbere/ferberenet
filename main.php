<?php
require_once('classes/template.class.php');
if(isset($rubro)){
	$rubro=$_GET['rubro'];
}
$tp=new templateParser('template/template.tpl');
include_once("classes/conex.php");
$link = Conectarse();  
 $consulta = mysql_query("SELECT * FROM template_index WHERE id = 8 ",$link);
	while($row = mysql_fetch_array($consulta)){  
$tp->parseTemplate($row);
echo $tp->display();
	}
?>
