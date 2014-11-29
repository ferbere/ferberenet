<?php
session_start();
include_once('../../../classes/mysql.php');
include_once("../../../classes/restaFechas.class.php");
include_once("../../../classes/temporada.class.php");
$mysql = new MySQL();
$user=$_POST["user"];
$catalogo=$_POST["catalogo"];
$desde=$_POST["desde"];
$hasta=$_POST["hasta"];
$cliente=$_POST["cliente"];

$calculoDias	= diferenciaEntreFechas( $desde, $hasta, "DIAS", FALSE);
/* El cálculo está metido en un array con la siguiente función. El orden es 1-villa, 2-temporada, 3-precio*/
$temp = array(1=>$desde,2=>$hasta);
for($i = 1; $i<=2; $i++){
	$temporada[$i] = temporada($temp[$i],$catalogo);	
	if($temporada[1][3]<=$temporada[2][3]){
		$precio = $temporada[1][3];
	}else{
		$precio = $temporada[2][3];
	}
}
		$suma = $calculoDias*$precio;

$que=$mysql->consulta("INSERT INTO comprar_index (user,suma,catalogo,precio,desde,hasta,cliente) values ('{$user}','{$suma}','{$catalogo}','{$precio}','{$desde}','{$hasta}','{$cliente}') ");
if(!$que){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
}else{
echo '<script>window.location.href="../../comprar.php?ruta=if_registro.php&capturado=1";</script>';
}
?>