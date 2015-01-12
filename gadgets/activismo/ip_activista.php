<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	include_once('../../classes/mysql.php');
	$mysql=new MySQL();
	if(isset($_POST['user'])){
		$user=addslashes(trim($_POST['user']));
	}
	if(isset($_POST['passwd'])){
		$passwd=md5(addslashes(trim($_POST['passwd'])));
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
	if(isset($_POST['redes'])){
		$redes=($_POST['redes']);
	}
	if(isset($_POST['discipulos'])){
		$discipulos=($_POST['discipulos']);
	}
	
	$sql=$mysql->consulta("SELECT url,pagina FROM template_general");
	$url=$mysql->fetch_array($sql);
	$path=$url[0].'/'.$url[1].'/'.$_SESSION['admin'].'/images/activismo/';
	//datos del arhivo 
	$nombre_archivo = $_FILES['imagen']['name']; 
	$tipo_archivo = $_FILES['imagen']['type']; 
	$tamano_archivo = $_FILES['imagen']['size']; 

	if(empty($nombre_archivo)){
		$que=$mysql->consulta("INSERT INTO activismo_index (user,passwd,nombre,rango,email,telefono,celular,domicilio,poblacion,estado,redes,discipulos) VALUES ('{$user}','{$passwd}','{$nombre}','{$rango}','{$email}','{$telefono}','{$celular}','{$domicilio}','{$poblacion}','{$estado}','{$redes}','{$discipulos}')");
				if(!$que){
					die ("Pos no se capturó el contenido, parece que: " .mysql_error());
					echo '<script>window.location.href="../../activismo.php?ruta=if_activista.php&capturado=0";</script>';
				}else{
					echo 	'<script>window.location.href="../../activismo.php?ruta=if_activista.php&capturado=1";</script>';
				}
	}else{  //!empty($nombre_archivo), por supuesto!!	
		if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1500000))) { 
				echo '<script>window.location.href="../../activismo.php?ruta=if_activista.php&capturado=2";</script>';  
		}else{ 
		   	if (move_uploaded_file($_FILES['imagen']['tmp_name'], $path.$nombre_archivo)){ 
			$que=$mysql->consulta("INSERT INTO activismo_index (user,passwd,nombre,imagen,rango,email,telefono,celular,domicilio,poblacion,estado,redes,discipulos) VALUES ('{$user}','{$passwd}','{$nombre}','{$nombre_archivo}','{$rango}','{$email}','{$telefono}','{$celular}','{$domicilio}','{$poblacion}','{$estado}','{$redes}','{$discipulos}')");
				if(!$que){
					die ("Pos no se capturó el contenido, parece que: " .mysql_error());
					echo '<script>window.location.href="../../activismo.php?ruta=if_activista.php&capturado=0";</script>';				
				}else{
				echo 	'<script>window.location.href="../../activismo.php?ruta=if_activista.php&capturado=1";</script>';
				}
			}
		}
	}
}
?>