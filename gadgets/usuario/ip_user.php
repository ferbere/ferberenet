<?php
session_start()
if($_SESSION["estado"]=='Autenticado'){
	//header("Location:index.php?rubro=1");
	require_once("conex.php");
	$link=Conectarse();
	if(isset($_POST['user'])){
		$user=addslashes(trim($_POST['user']));
	}
	if(isset($_POST['passwd'])){
		$passwd=md5(addslashes(trim($_POST['passwd'])));
	}
	if(isset($_POST['mail'])){
		$mail=($_POST['mail']);
	}
	if(isset($_POST['nombre'])){
		$nombre=($_POST['nombre']);
	}
	if(isset($_POST['domicilio'])){
		$domicilio=($_POST['domicilio']);
	}
	if(isset($_POST['poblacion'])){
		$poblacion=($_POST['poblacion']);
	}
	if(isset($_POST['cp'])){
		$cp=($_POST['cp']);
	}
	if(isset($_POST['pais'])){
		$pais=($_POST['pais']);
	}
	if(isset($_POST['rfc'])){
		$rfc=($_POST['rfc']);
	}
	if(isset($_POST['telefono'])){
		$telefono=($_POST['telefono']);
	}
	if(isset($_POST['celular'])){
		$celular=($_POST['celular']);
	}
	echo $user;
	$mysql=mysql_query("INSERT INTO user (user,passwd,maill,nombre,domicilio,poblacion,cp,pais,rfc,telefono,celular) values ('{$user}','{$passwd}','{$mail}','{$nombre}','{$domicilio}','{$poblacion}','{$cp}','{$pais}','{$rfc}','{$telefono}','{$celular}')",$link);
	if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
	}else{
	echo '<script>window.location.href="'.$_SERVER['HTTP_REFERER'].'?capturado=1";</script>';
	}
}else{
echo "Usted no tiene acceso a esta seccción";
}
	?>