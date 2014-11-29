<?php
include_once('../../../classes/conex.php');
$link=Conectarse();
$ip = $REMOTE_ADDR; 
$fecha = date("D d M Y"); 
$hora = date("h:i:s"); 
$segundos = time(); 
$can = "3600"; 
$can_linea = "10"; 
$resta = $segundos-$can; 
$linea = $segundos+$can_linea; 
//se asignan la variables 
$sql = "SELECT segundos, ip "; 
$sql.= "FROM contador WHERE segundos >= $resta AND ip LIKE '$ip' "; 
$rst = mysql_query($sql, $link) or die("Error al leer base de datos: ".mysql_error); 
//se buscan los registros que num de seg mayor a num de seg hace una hora e ip 
if(mysql_num_rows($rst)>0) 
{//no se cuenta la visita 
} 
else 
{ 
$sql = "INSERT INTO contador (id, ip, fecha, hora, segundos) "; 
$sql.= "VALUES ('','$ip','$fecha','$hora','$segundos')"; 
$rst = mysql_query($sql, $link) or die("Error al grabar un mensaje: ".mysql_error); 
} 
//creamos el condicionamiendo para loguearlo o no. 
$sql = "SELECT * "; 
$sql.= "FROM contador WHERE id "; 
$rst = mysql_query($sql, $link) or die("Error al leer base de datos: ".mysql_error); 
$visitas = mysql_num_rows($rst); 
$men=$men . 
"<table width='6%' border='0' height='25' bgcolor='#000000'>" . chr(10); 
$men=$men . "<tr>" . chr(10); 
$men=$men . "<td><font color=#000000>Visitas:$visitas</font></td>" . chr(10);
$men=$men . 
"</tr>" . chr(10); 
$men=$men . "</table>" . chr(10);
?>

