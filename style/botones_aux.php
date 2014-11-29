<?php session_start();
include_once("classes/mysql.php");
$mysql=new MySQL();

$sql_u=$mysql->consulta("SELECT url,pagina FROM template_general");
$url=$mysql->fetch_array($sql_u);
if(empty($url[1])){
	$url_c='http://localhost/';
}else{
	$url_c='http://'.$url[1].'/';
}
$path=$url_c.$_SESSION['admin'];

$total=2;
$boton=array
	(
	array('site','Ir al sitio','view_site.png',$path),
	array('back','Regresar','left.png',$_SERVER['HTTP_REFERER']),
	);
echo '<div id="botones_aux-int">';
		echo '<div>Usuario:: '.$_SESSION['user'].'</div>';
	for($i=0;$i<$total;$i++){
		echo '<div id="botones_aux-int'.($i+1).'">';
		echo 		'<a href="'.$boton[$i][3].'">';
		echo 			'<img src="../../ferberenet/images/'.$boton[$i][2].'" width="20px" class="rollover">';
		echo 		'</a>'.$boton[$i][1];
		echo 	'</div>';
	}
echo '</div>';
?>