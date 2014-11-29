<?php
if(isset($_GET['rubro'])){
	$rubro=$_GET['rubro'];
}
include_once('../../../classes/conex.php');
$link=Conectarse();

$leido=mysql_query("UPDATE mails_index SET status = 1 WHERE id = '$rubro' ",$link);
if(!$leido){
	die ("A ver, parece que tenemos el típico problema del <b><i>" .mysql_error()."</i></b>");
}
$sql="SELECT * FROM mails_index WHERE id = '$rubro' ";
$result=mysql_query($sql,$link);
while ($row=mysql_fetch_array($result)){
	$nombre = $row['nombre'];
	$mail=$row['email'];
	$re=$row['titulo'];
	$ip=$row['ip'];
?>
	<div id="form-main">
		<form method="post" action="gadgets/fotos/ip_fotos.php">
		<div id="maincontent-tit">
			Buzón de <?php echo $_SESSION['user'] ?><br><br>
		</div>
			<div id="maincontent-body">
<?php
 getdate($registro['tiempo']);
$fecha=getdate();
$fecha_d=$fecha['mday']."\n".$fecha['month']."\n".$fecha['year'];
$fecha_t=$fecha['hours'].':'.$fecha['minutes'];
echo '<font color="#CC6633">Mensaje enviado por'.' <strong>'.$mail.'</strong>, el día '.''.$fecha_d.','."\n".' a las '.$fecha_t.' horas. La ip registrada del remitente es: '.$ip.'</font><br>';
?>
			</div>
				<div id="bann1-c" style="margin:0 auto;width:65%">
					<br><strong>Título: </strong>
<?php
echo $row['titulo'];
?>
				</div><br>
					<div style="border:1px dotted; margin:0 auto;padding:1%;width:65%">
						<strong>Mensaje</strong><br>
<?php
echo $row['mensaje'];
}
?>
					</div>
						<div style="margin:0 auto;padding:1%;width:65%">
			<a href="mailto:<?php echo $mail ?>?subject=Apreciable <?php echo $nombre ?> (respuesta a su correo: <?php echo $re ?>)">responder</a></td>
<td><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">volver</a></td></tr></table>
						</div>
	</div>