<?php
session_start();
extract($_SESSION);
include_once("classes/mysql.php");
include_once("classes/restaFechas.class.php");
$mysql = new MySQL();
$sql2 = $mysql -> consulta("SELECT DISTINCT(user) FROM comprar_index ORDER BY id ASC ");
?>
<script language=javascript> 
function ventanaSecundaria (URL){ 
   window.open(URL,"ventana1","width=700 height=600 scrollbars=NO",titlebar="yes") 
} 
</script>
<?php
while($row2 = $mysql -> fetch_array($sql2)){
	$usuario = $row2['user'];
	$sql = $mysql -> consulta("SELECT comprar_index.id,comprar_index.user,catalogo_index.nombre,comprar_index.desde,comprar_index.hasta,comprar_index.precio,comprar_index.suma,comprar_index.fecha,comprar_directorio.name FROM comprar_index INNER JOIN catalogo_index ON comprar_index.catalogo = catalogo_index.id INNER JOIN comprar_directorio ON comprar_index.cliente = comprar_directorio.id WHERE comprar_index.user = '$usuario' ORDER BY comprar_index.id DESC ");
	$cuenta = $mysql->num_rows($sql);
	echo	"<strong>El usuario <big>".$usuario.'</big> tiene registrados los siguientes movimientos:</strong><br><br>';
	while($row = $mysql -> fetch_array($sql)){
		$id			=	$row[0];
		$catalogo	=	$row[2];
		$desde		= $row[3];
		$hasta		= $row[4];
		$precio		= $row[5];
		$suma		= $row[6];
		$dias		= diferenciaEntreFechas( $desde, $hasta, "DIAS", FALSE);
		$cliente	= $row[8];
		$total		= $precio*$dias;
	echo '<table style="width:100%" border="1">';
	echo 	'<tr>';
//	echo 		'<td style="border:1px dotted" colspan="4">
//					Operación: '.$row['id']."\n";
	echo 'Realizada el día '.$row[7].'  ';
	if($cliente!='ninguno'){
	echo ' a nombre de: <strong>'.$cliente.'</strong>';
	}
	echo 		'</td>';
	echo 	'</tr>';
	echo 	'<tr>';
	echo '<td style="width:20%;">Villa: </td>';
	echo '<td style="width:10%; text-align:center">Desde</td>';
	echo '<td style="width:10%; text-align:center">Hasta</td>';
	echo '<td style="width:10%; text-align:center">Días</td>';
	echo '<td style="width:30%; text-align:center">Precio unitario:</td>';
	echo '<td style="width:30%; text-align:center">Cantidad: </td>';
	echo '</tr>';

	echo 	'<tr>';
	echo '<td style="width:20%;">';
	echo '<a href="'.$_SERVER['PHP_SELF'].'?ruta=if_registro_a.php&rubro='.$id.'">';
	echo $catalogo;
	echo '</a></td>';
	echo '<td style="width:10%; text-align:center">'.$desde.'</td>';
	echo '<td style="width:10%; text-align:center">'.$hasta.'</td>';
	echo '<td style="width:10%; text-align:center">'.$dias.'</td>';
	echo '<td style="width:30%; text-align:right">us$'.number_format($precio,2).'</td>';
	echo '<td style="width:30%; text-align:right">us$'.number_format($total,2).'</td>';
	echo '</tr>';


	echo '<tr>';
	echo '<td colspan="5" style="text-align:right;">';
	echo '<strong>Monto total:</td>';
	echo '<td style="text-align:right;">';
	echo '<b>us$'.number_format($total,2).'</b>';
	echo '</strong></td>';
	echo '</tr>';
	echo '</table>';
		$sumatotal = $sumatotal+$total;
}
		echo '<hr style="height:2px;background:#835881">';
}
		echo '<table style="font-size:120%;text-align:right;width:100%"><tr><td>Monto total de operaciones:  <b>us$'.number_format($sumatotal,2).'</b></td></tr></table>';
?>