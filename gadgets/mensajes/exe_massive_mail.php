<?php
include_once("../classes/mysql.php");
$mysql = new MySQL();
if(isset($_GET['rubro'])){
	$rubro=$_GET['rubro'];
}
$sql = $mysql->consulta("SELECT titulo,mensaje,grupo FROM mails_massive_mensajes WHERE enviado = 0 AND id = '$rubro' ");
$row = $mysql->fetch_array($sql);
	$titulo = $row['titulo'];
	$mensaje = $row['mensaje'];
	$grupo = $row['grupo'];
	if(isset($_GET['grupo'])){
		$grupo=$_GET['grupo'];
	}
	if(empty($grupo)){
		$grupo=0;
	}
/*	if($grupo==1){
		$grup ='';
	}else{*/
		$grup = "";//" AND grupo = ".$grupo;
//	}
$mysql2 = new MySQL();
$sql2 = $mysql2->consulta("SELECT nombre,email FROM mails_massive_directorio WHERE confirmacion = 0 AND email != '' ".$grup);
while($row2 = $mysql2->fetch_array($sql2)){
	$nombre = $row2['nombre'];
	$email=$row2['email'];
	$cuerpo ="Apreciable ".$nombre.":<br> ";
	$cuerpo .= $mensaje;
	$cuerpo .= '<br><br>Confirme su asistencia en este botón: <a href="http://www.sayulitacalappa.com/calappa/confirmaciones.php?email='.$email.'">confirmar</a>';
	$cuerpo .= '<br><br><br>
	<img src="http://www.sayulitacalappa.com/calappa/style/images/logoCH.png"><br>
	<i>Olga Diaque, escritora</i><br>';
	$cuerpo .= '<small><b>contact@sayulitacalappa.com<br>
	www.sayulitacalappa.com</b></small>';

	$cabeceras = "Content-type: text/html;charset=utf-8\r\n";
	$cabeceras .="From: send@sayulitacalappa.com\r\n";
	$cabeceras .="Bcc: bills@sayulitacalappa.com" . "\r\n";
	mail($email,$titulo,$cuerpo,$cabeceras);
}
echo '<script>window.location.href="../admin/mensajes.php?ruta=enviado.php&rubro='.$rubro.'&grupo='.$grupo.'"</script>';
exit();

?>
