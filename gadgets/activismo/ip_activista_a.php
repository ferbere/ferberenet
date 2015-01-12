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
		if(isset($_POST['nombre'])){
			$nombre=($_POST['nombre']);
		}
		if(isset($_POST['rango'])){
			$rango=($_POST['rango']);
		}
		if(isset($_POST['email'])){
			$email=($_POST['email']);
		}
		if(isset($_POST['telefono'])){
			$telefono=($_POST['telefono']);
		}
		if(isset($_POST['celular'])){
			$celular=($_POST['celular']);
		}
		if(isset($_POST['domicilio'])){
			$domicilio=($_POST['domicilio']);
		}
		if(isset($_POST['poblacion'])){
			$poblacion=($_POST['poblacion']);
		}
		if(isset($_POST['estado'])){
			$estado=($_POST['estado']);
		}
		if(isset($_POST['privilegios'])){
			$privilegios=($_POST['privilegios']);
		}
		if(isset($_POST['redes'])){
			$redes=($_POST['redes']);
		}
		if(isset($_POST['discipulos'])){
			$discipulos=($_POST['discipulos']);
		}
	$mysql=mysql_query("UPDATE activismo_index SET user='$user', nombre='$nombre',imagen='$imagen',rango='$rango',email='$email',telefono='$telefono', celular='$celular',domicilio='$domicilio', poblacion='$poblacion',estado='$estado',redes='$redes',discipulos='$discipulos' WHERE id = $rubro ",$link);
	if(!$mysql){die ("Pos no se capturó el contenido, parece que: " .mysql_error());
	}else{
	echo '<script>window.location.href="../../activismo.php?ruta=if_activista_a.php&capturado=1";</script>';
	}
}else{
echo "Usted no tiene acceso a esta seccción";
}

?>