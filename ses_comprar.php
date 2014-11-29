<?php
session_start();
if(isset($_POST['user'])){
	$user=addslashes(trim($_POST['user']));
}
if(isset($_POST['passwd'])){
	$passwd=md5(addslashes(trim($_POST['passwd'])));
}
include_once("../classes/mysql.php");
$mysql = new MySQL();
$sql=$mysql->consulta("SELECT comprar_directorio.id,comprar_directorio.user,comprar_directorio.passwd FROM comprar_directorio WHERE comprar_directorio.user = '$user' AND activated = 1 AND comprar_directorio.passwd = '$passwd'") or die (mysql_error());
$row = $mysql ->fetch_array($sql);
?>
	<div align="center">
<?php
if(isset($_GET['loop'])){
	$loop=$_GET['loop'];
}
if(isset($_POST['loop'])){
	$loop=$_POST['loop'];
}
if(empty($loop)){
	$loop=1;
}
if($row['user']!=$user OR $row['passwd']!=$passwd){
	$loop = $loop+1;
	if($loop<=3){
		echo '¡Ooops! There´s something wrong<br>';
		echo '<a href="sesion.php?loop='.$loop.'">Try again.</a><br>';		
	}else{
		header("Location:sesion.php?capturado=1");
		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	}
}else{
	$_SESSION['id']=$row['id'];
	$_SESSION['user']=$row['user'];
}
?>
	</div>