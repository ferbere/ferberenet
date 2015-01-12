<?php
session_start();
if(isset($_POST['user'])){
	$user=addslashes(trim($_POST['user']));
}
if(isset($_POST['passwd'])){
	$passwd=md5(addslashes(trim($_POST['passwd'])));
}
include_once("classes/mysql.php");
$mysql = new MySQL();
$sql=$mysql->consulta("SELECT usuario_index.id,usuario_index.user,usuario_index.passwd,usuario_privilegios.nombre,usuario_privilegios.id FROM usuario_index,usuario_privilegios WHERE usuario_index.user = '$user' AND usuario_index.passwd = '$passwd' AND usuario_index.privilegios = usuario_privilegios.id") or die (mysql_error());
$datos = $mysql ->fetch_array($sql);
?>
	<div align="center">
<?php
echo $datos['nombre'];
if($datos['user']!=$user OR $datos['passwd']!=$passwd){
	echo "¡Chin! Los datos están incorrectos";
}else{
	$_SESSION['id']=$datos[0];
	$_SESSION['user']=$datos[1];
	$_SESSION['privilegioss']=$datos[3];
	$_SESSION['privilegioss_id']=$datos[4];
	$_SESSION['estado']='Autenticado';
	echo "<div align='center'> Bienvenido ".$_SESSION['user'];
?>
	<br><a href="destroy.php">Terminar sesión</a></div>
<?php
}
?>