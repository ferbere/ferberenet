<?php
session_start();
?>
<!-- <script language="JavaScript">
function muestra(queCosa)
{
	alert(queCosa);
}
</script> -->
	<div id="form-main">
		<div id="maincontent-tit">
			Correspondencia de <?php echo $_SESSION['user']; ?><br><br>
		</div>
			<div align="center">
<?php 
$usuario=$_SESSION['user'];
//$criterio = "WHERE nombre like 'general' or dirigido like '$usuario' ";
$sql="SELECT * FROM mails_index ".$criterio;
$res=mysql_query($sql);
$numeroRegistros=mysql_num_rows($res);
if($numeroRegistros<=0)
{
	echo "<font face='verdana' size='-2'>No hay correos</font>";
}else{
//////////elementos para el orden
if(!isset($orden))
{
$orden="id";
}
//////////fin elementos de orden

//////////calculo de elementos necesarios para paginacion
//tamaño de la pagina
$tamPag=5;

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
$sql="SELECT * FROM mails_index ".$criterio." ORDER BY ".$orden.",id ASC LIMIT ".$limitInf.",".$tamPag;
$res=mysql_query($sql);
?>
<!--fin consulta con limites-->
<div align='center'>
	<font face='verdana' size='-2'>Hay <?php echo $numeroRegistros; ?> correos en la bandeja<br>
ordenados por <b>"<?php echo $orden. "</b>";
if(isset($txt_criterio)){
echo "<br>Valor filtro: <b>".$txt_criterio."</b>";
}
?>
</font>
</div>
	<div align='center' style="border: 0px solid; width: 600px">
	<br>
		<table id='mens' align='center' width='550px' cellspacing='1' cellpadding='0' border="0">
			<tr>
				<td colspan='6'>
					<hr noshade color='#CC6633' size='1'></td></tr>
					<th><a href='<?php echo "mensajes.php?ruta=bus_mensajes.php&pagina=".$pagina."&orden=nombre&criterio=".$txt_criterio."'>Nombre</a></th>";
echo "<th ><a  href='mensajes.php?ruta=bus_mensajes.php&pagina=".$pagina."&orden=titulo&criterio=".$txt_criterio."'>Título</a></th>";
echo "<th ><a  href='mensajes.php?ruta=bus_mensajes.php&pagina=".$pagina."&orden=tiempo&criterio=".$txt_criterio."'>Fecha</a></th>";
echo "<th ><a  href='mensajes.php?ruta=bus_mensajes.php&pagina=".$pagina."&orden=dirigido&criterio=".$txt_criterio."'>Dirigido</a></th>";
echo "<th ><a  href='mensajes.php?ruta=bus_mensajes.php&pagina=".$pagina."&orden=status&criterio=".$txt_criterio."'>Status</a></th>";
echo "<th >Borrar</th>";
while($registro=mysql_fetch_array($res))
{
$sql=mysql_query("SELECT * FROM usuario_user ORDER BY id DESC",$link);
while ($row=mysql_fetch_array($sql)){
if($registro['dirigido']!=$row['id']){
$usuario2="general";
}else{
$usuario2=$row['user'];
}
}
$bole_p=$registro["id"];
if($registro['status']==0){
$status="<font color=#ff9900>Nuevo</font>";
}else{
$status="Leído";
}
$timestamp = strtotime($registro['tiempo']);
$fecha = date('F d, Y', $timestamp);
?>
<!-- tabla de resultados -->
<tr onMouseOver="this.style.backgroundColor='#222222';this.style.cursor='hand';"
onMouseOut="this.style.backgroundColor=''"o"];"
onClick="javascript:muestra('<? echo "[".$registro["id"]."] ".$registro["titulo"]." - ".$registro["subtitulo"]; ?>');">
<td class="mens_carr" align="justify"><a href='mensajes.php?ruta=mensaje.php&mail=8&rubro=<?php echo "$bole_p" ?>'>
<? echo $registro["nombre"]; ?></a></td>
<td class="mens_carr" align="justify"><? echo $registro["titulo"]; ?></td>
<td class="mens_carr" align="center"><? echo $fecha;// $fecha_d; ?></td>
<td class="mens_carr" align="center"><? echo $registro['nombre']; ?></td>
<td class="mens_carr" align="center"><? echo $status; ?></td>
<td class="mens_carr" align="center"><a href='mensajes.php?ruta=borra.php&borra=1&rubro=<?php echo "$bole_p" ?>'>borrar</a></td>
</tr>
<!-- fin tabla resultados -->
<?php
}//fin while
echo "</table></div>";
}//fin if
//////////a partir de aqui viene la paginacion
?>
<br>
<table cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td align="center" valign="top">
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
echo "<a class='p' href='mensajes.php?ruta=bus_mensajes.php&pagina=".$i."&orden=".$orden."&criterio=".$txt_criterio."'>";
echo "<font face='verdana' size='-2'>".$i."</font></a>&nbsp;";
}
}
if($pagina<$numPags)
{
echo "&nbsp;<a class='p' href='mensajes.php?ruta=bus_mensajes.php&pagina=".($pagina+1)."&orden=".$orden."&criterio=".$txt_criterio."'>";
echo "<font face='verdana' size='-2'>siguiente</font></a><br><br>";
}
}
?>
			</td>
		</tr>
	</table>
	</div>
</div>