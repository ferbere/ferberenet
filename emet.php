<?php
session_start();
	unset($_SESSION['admin']);
	echo $_SESSION['admin'];
?>
<link rel="stylesheet" type="text/css" href="style/style_admin.css" />
<?php
if(isset($_GET['pagina'])){
	$pagina=$_SET['pagina'];
}
if(isset($_GET['capturado'])){
	$capturado=$_GET['capturado'];
}
if(isset($_POST['capturado'])){
	$capturado=$_POST['capturado'];
}
if(isset($_GET['ruta'])){
	$ruta=$_SET['ruta'];
}
if(empty($capturado)){
	echo 'pos 1';
	?>
	<form method="post" action="emet.php">
	<input type="hidden" name="capturado" value="emma">
	<input type="text" name="ruta" placeholder="ruta">
	<input type="text" name="oth" placeholder="password">
	<input type="submit" value="entrar">
<?php
}elseif($capturado=='emma'){
//	include_once("classes/mysql.php");
//	$mysql=new MySQL();
	echo 'pos 2';
	if(isset($_POST['ruta'])){
		$ruta=$_POST['ruta'];
	}
	$gain=array(1=>"ferberenet",2=>"ferbeta",3=>"prospectool",4=>"umano",5=>"babyland",6=>"groundcontrol",7=>"revista");
	if(in_array($ruta,$gain)){
		echo '<script>window.location.href="emet.php?capturado=alba&ruta='.$ruta.'";</script>';
		echo $capturado;
	}else{
		echo 'Fuera de aquí, '.$ruta.' no es es una entrada válida.';
	}

}elseif($capturado=='alba') {
	echo 'pos 3';
	if(isset($_GET['ruta'])){
		$ruta=$_GET['ruta'];
	}
	$_SESSION['admin']=$ruta;
//	echo '<script>window.location.href="../'.$ruta.'/parallax/";</script>';
	echo '<script>window.location.href="index.php?pagina='.$ruta.'";</script>';
}else{
	echo 'pos 4';
	echo 'Fuera de aquí';
}
?>