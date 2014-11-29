<?php 
//require("conex.php");
$link=Conectarse();
?>
<!-- <script language="JavaScript">
function muestra(queCosa)
{
	alert(queCosa);
}
</script> -->
<table id="mens">
	<tr>
		<td>
<?php 
echo '<p style="text-align:center"><h1>Contador de visitas</h1></p> ';
$criterio = "WHERE dirigido like 'general' or dirigido like '$usuario' ";
$sql="SELECT * FROM contador ";
$res=mysql_query($sql);
$numeroRegistros=mysql_num_rows($res);
if($numeroRegistros<=0)
{
echo "<font face='verdana' size='-2'>No hay visitas</font>";
	echo '</td>
		</tr>
</table>';
}else{
//////////elementos para el orden
if(!isset($orden))
{
$orden="id";
}
//////////fin elementos de orden

//////////calculo de elementos necesarios para paginacion
//tamaño de la pagina
$tamPag=15;

//pagina actual si no esta definida y limites
if(!isset($pagina))
{
$pagina=1;
$inicio=1;
$final=$tamPag;
}
//calculo del limite inferior
$limitInf=($pagina-1)*$tamPag;

//calculo del numero de paginas
$numPags=ceil($numeroRegistros/$tamPag);
if(!isset($pagina))
{
$pagina=1;
$inicio=1;
$final=$tamPag;
}else{
$seccionActual=intval(($pagina-1)/$tamPag);
$inicio=($seccionActual*$tamPag)+1;

if($pagina<$numPags)
{
$final=$inicio+$tamPag-1;
}else{
$final=$numPags;
}
                
if ($final>$numPags){
$final=$numPags;
}
/////////fin de dicho calculo

//////////creacion de la consulta con limites
$sql="SELECT * FROM contador  ORDER BY ".$orden.",id ASC LIMIT ".$limitInf.",".$tamPag;
$res=mysql_query($sql);

//////////fin consulta con limites
echo "<div align='center'>";
echo "<font face='verdana' size='-2'>Hay ".$numeroRegistros." visitas<br>";
echo "ordenados por <b>".$orden."</b>";
if(isset($txt_criterio)){
echo "<br>Valor filtro: <b>".$txt_criterio."</b>";
}
echo "</font></div><div align='center'><br>";
echo "<table id='mens' align='center' width='550px' border='0' cellspacing='1' cellpadding='0'>";
echo "<th><a  href='".$_SERVER["PHP_SELF"]."?pagina=".$pagina."&orden=id&criterio=".$txt_criterio."'>Id</a></th>";
echo "<th ><a  href='".$_SERVER["PHP_SELF"]."?pagina=".$pagina."&orden=ip&criterio=".$txt_criterio."'>IP</a></th>";
echo "<th ><a  href='".$_SERVER["PHP_SELF"]."?pagina=".$pagina."&orden=fecha&criterio=".$txt_criterio."'>Fecha</a></th>";
echo "<th ><a  href='".$_SERVER["PHP_SELF"]."?pagina=".$pagina."&orden=hora&criterio=".$txt_criterio."'>hora</a></th>";
while($registro=mysql_fetch_array($res))
{
$bole_p=$registro["id"];
?>
<!-- tabla de resultados -->
<tr onMouseOver="this.style.backgroundColor='#222222';this.style.cursor='hand';"
onMouseOut="this.style.backgroundColor=''"o"];"
onClick="javascript:muestra('<? echo "[".$registro["id"]."] ".$registro["titulo"]." - ".$registro["subtitulo"]; ?>');">
<td class="mens_carr" align="justify"><? echo $registro["id"]; ?></td>
<td class="mens_carr" align="justify"><a href="http://www.elhacker.net/geolocalizacion.html?host=<?php echo $registro["ip"]; ?>" target="_blank"><? echo $registro["ip"]; ?></a></td>
<td class="mens_carr" align="center"><? echo $registro['fecha']; ?></td>
<td class="mens_carr" align="center"><? echo $registro['hora']; ?></td>
<td class="mens_carr" align="center"><? echo $status; ?></td>
</tr>
<!-- fin tabla resultados -->
<?php
}//fin while
echo "</table>";
}//fin if
//////////a partir de aqui viene la paginacion
?>
<br>
<table border="0" cellspacing="0" cellpadding="0" align="center">
<tr><td align="center" valign="top">
<?php
if($pagina>1)
{
echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina-1)."&orden=".$orden."&criterio=".$txt_criterio."'>";
echo "<font face='verdana' size='-2'>anterior</font>";
echo "</a>&nbsp;";
}

for($i=$inicio;$i<=$final;$i++)
{
if($i==$pagina)
{
echo "<font face='verdana' size='-2'><b>".$i."</b>&nbsp;</font>";
}else{
echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".$i."&orden=".$orden."&criterio=".$txt_criterio."'>";
echo "<font face='verdana' size='-2'>".$i."</font></a>&nbsp;";
}
}
if($pagina<$numPags)
{
echo "&nbsp;<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina+1)."&orden=".$orden."&criterio=".$txt_criterio."'>";
echo "<font face='verdana' size='-2'>siguiente</font></a><br><br>";
}
}
	//////////fin de la paginacion
?>
<?php
echo "<font size='2'>Para ver de dónde le han visitado, haga click en el IP.</font><br><br>";
?>
