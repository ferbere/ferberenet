<?php
session_start();
if($_GET['rubro']){
	$rubro=$_GET['rubro'];
}
if($_GET['ruta']){
	$ruta=$_GET['ruta'];
}
include_once("classes/sacaIzq.class.php");
include_once("classes/sacaDer.class.php");
require_once('classes/template.class.php');
$url	= $_SERVER['PHP_SELF'];
$recorte= '/admin';

$sacaIzq = sacaIzq($url,$recorte);
$sacaDer = sacaDer($url,$recorte);
$pagina= sacar($_SERVER['PHP_SELF'],"ferberenet/",".php");
if(($pagina=='catalogo')&&(($ruta=='if_label_a.php')||($ruta=='bus_asigna.php'))){
	include_once('classes/mysql.php');
	$mysql=new MySQL();
	?>
	<div id="bann1">
		<h3 style="text-align:center">Piezas integradas a la etiqueta</h3>
	<?php
		$sql=$mysql->consulta("SELECT catalogo_index.imagen FROM catalogo_index INNER JOIN catalogo_asigna ON catalogo_index.id = catalogo_asigna.pieza WHERE catalogo_asigna.label = '$rubro' UNION SELECT template_general.pagina FROM template_general");
		$cuenta=$mysql->num_rows($sql);
		$i=1;
		while($row=$mysql->fetch_array($sql)){
			if($i!=$cuenta){
				echo '<img src="../'.$_SESSION['admin'].'/images/catalogo/'.$row[0].'">';
			}else{
				break;
			}
			$i=$i+1;
		}
		echo '<br><br>'.($cuenta-1).' piezas.<br><br>';
		echo '<b>Liga para distribuir:</b></br><br>';
		echo 'http://www.'.$row[0].'/'.$_SESSION['admin'].'/catalogo.php?ruta='.$rubro;
	echo '</div>';
}
?>