<?php
include_once('../../../classes/mysql.php');
$mysql=new MySQL();
if(isset($_GET['rubro'])){
	$rubro=$_GET['rubro'];
}
if(isset($_GET['diputado'])){
	$diputado=$_GET['diputado'];
}
if(isset($_GET['asigna'])){
	$asigna=$_GET['asigna'];
}
if(isset($_GET['suscribe'])){
	$suscribe=$_GET['suscribe'];
}
if(($asigna==1)&&($suscribe=='')){
	$mysql->consulta("INSERT INTO perfil_asigna_iniciativa (iniciativa,diputado) VALUES ('{$rubro}','{$diputado}') ");
}elseif(($asigna==0)&&($suscribe=='')){
	$mysql->consulta("DELETE FROM perfil_asigna_iniciativa WHERE iniciativa = '$rubro' AND diputado = '$diputado' ");
}elseif(($asigna=='')&&($suscribe==1)){
	$mysql->consulta("UPDATE perfil_asigna_iniciativa SET suscribe = 1  WHERE iniciativa = '$rubro' AND diputado = '$diputado' ");
}elseif(($asigna=='')&&($suscribe==0)){
	$mysql->consulta("UPDATE perfil_asigna_iniciativa SET suscribe = 0  WHERE iniciativa = '$rubro' AND diputado = '$diputado' ");
}
echo '<script>window.location.href="../../perfil.php?ruta=if_iniciativa_a.php&rubro='.$rubro.'";</script>';

?>