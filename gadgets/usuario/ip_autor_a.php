<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	include_once('../../classes/conex.php');
	$link=Conectarse();
		if(isset($_POST['rubro'])){
			$rubro=$_POST['rubro'];
		}
		if(isset($_POST['user'])){
			$user=addslashes(trim($_POST['user']));
		}
		if(isset($_POST['maill'])){
			$maill=($_POST['maill']);
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
		if(isset($_POST['telefono'])){
			$telefono=($_POST['telefono']);
		}
		if(isset($_POST['celular'])){
			$celular=($_POST['celular']);
		}
		if(isset($_POST['privilegios'])){
			$privilegios=($_POST['privilegios']);
		}
	$mysql=mysql_query("UPDATE usuario_index SET user='$user', maill='$maill', nombre='$nombre', domicilio='$domicilio', poblacion='$poblacion', telefono='$telefono', celular='$celular', privilegios='$privilegios' WHERE id = $rubro ",$link);
	if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
	}else{
	echo '<script>window.location.href="../../usuario.php?ruta=if_autor_a.php&capturado=1";</script>';
	}
}else{
echo "Usted no tiene acceso a esta seccción";
}

?>