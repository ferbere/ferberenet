<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	extract($_SESSION);
	if (isset($_GET['pag'])){
		$pag=$_GET['pag'];
	}else{
		$pag=0;
	}
	if(isset($_GET['criterio'])){
		$criterio = $_GET['criterio'];
	}else{
		$criterio='';
	}
	if(isset($_GET['ruta'])){
		$ruta = $_GET['ruta'];
	}

		if(empty($ruta)){
			$ruta='bus_usuario.php';
		}
	?>
	<h1>Edita Usuario</h1>
	<div align="center">
		<form action="usuario.php" method="get">
		Criterio de búsqueda:
			<input type="hidden" name="ruta" value="<?php echo $ruta ?>">
			<input type="text" name="criterio" size="22" maxlength="150">
			<input type="submit" value="Buscar">
		</form>
	</div>
		<div style="margin: 0px auto">
	<?php
				include_once("classes/sacar.class.php");
				$self=sacar($_SERVER['PHP_SELF'],"ferberenet/",".php");
				include_once("classes/buscador.class.php");
				mysql_query('set @numero=0');
				$sql = "SELECT @numero:=@numero+1 AS orden,usuario_index.user,usuario_privilegios.nombre,usuario_index.id FROM usuario_index INNER JOIN usuario_privilegios ON usuario_index.privilegios = usuario_privilegios.id WHERE usuario_index.privilegios >= '$privilegioss_id' ";
				if($privilegioss=='ferbere'){
					$pez=" AND usuario_index.user like '%" . $criterio . "%'";	
				}elseif($privilegioss=='admin'){
					$pez=" AND usuario_index.user like '%" . $criterio . "%'";
				}else{
					$pez=" AND usuario_index.user = '$user'";
				}
				$celdas=array(0=>'orden',1=>'user',2=>'privilegios');
				$set='if_autor_a.php';
				$ruta='bus_usuario.php';
				$order=' ORDER BY id DESC LIMIT ';
				$borra=1;
				$clPag = new paginacion($pez,$self);
				$clPag1=$clPag->cuantos($sql);
				$clPag2=$clPag->pagina($pag,$sql,$set,$order,$borra,$celdas);
				$clPag3=$clPag->pie($pag,$sql);
				echo  $clPag1[0];
				echo  $clPag2;
				echo  $clPag3;
	?>
		</div>
<?php
}else{
	echo "Usted no tiene acceso a esta seccción";
}
?>