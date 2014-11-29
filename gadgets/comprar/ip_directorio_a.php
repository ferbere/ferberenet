<?php
session_start();
if(($_SESSION['privilegioss']=='ferbere')||($_SESSION['privilegioss']=='admin')){	
	include_once('../../../classes/mysql.php');
	$mysql = new MySQL();
	if(isset($_POST['rubro'])){
		$rubro=$_POST["rubro"];
	}
	if(isset($_POST['user'])){
		$user=$_POST["user"];
	}
	if(isset($_POST['passwd'])){
		$passwd=$_POST["passwd"];
	}
	if(isset($_POST['name'])){
		$name=$_POST["name"];
	}
	if(isset($_POST['address'])){
		$address=$_POST["address"];
	}
	if(isset($_POST['city'])){
		$city=$_POST["city"];
	}
	if(isset($_POST['state'])){
		$state=$_POST["state"];
	}
	if(isset($_POST['country'])){
		$country=$_POST["country"];
	}
	if(isset($_POST['zip'])){
		$zip=$_POST["zip"];
	}
	if(isset($_POST['mail'])){
		$mail=$_POST["mail"];
	}
	if(isset($_POST['phone'])){
		$phone=$_POST["phone"];
	}
	if(isset($_POST['activated'])){
		$activated=$_POST["activated"];
	}
	$sql=$mysql->consulta("UPDATE comprar_directorio SET user='$user' ,passwd='$passwd',name='$name',address='$address',city='$city',state='$state',country='$country',zip='$zip',mail='$mail',phone='$phone',activated='$activated' WHERE id ='$rubro'");
		if(!$sql){
			echo '<script>window.location.href="../../comprar.php?ruta=if_directorio_a.php&capturado=2";</script>';
		}else{
			echo '<script>window.location.href="../../comprar.php?ruta=if_directorio_a.php&capturado=1";</script>';
		}
}else{
echo '<script>window.location.href="../../comprar.php?ruta=if_directorio_a.php&capturado=2";</script>';
}
?>