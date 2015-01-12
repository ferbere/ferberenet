<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
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
			$ruta='bus_activista.php';
		}
	?>
	<div align="center">
		<form action="activismo.php" method="get">
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
				$sql = "SELECT activismo_index.id,activismo_index.user,activismo_rango.nombre FROM activismo_index INNER JOIN activismo_rango ON activismo_index.rango = activismo_rango.id WHERE activismo_index.rango > 0 ";
/*				if($privilegioss=='ferbere'){
					$pez=" AND activismo_index.user like '%" . $criterio . "%'";	
				}elseif($privilegioss=='admin'){
					$pez=" AND activismo_index.user like '%" . $criterio . "%'";
				}else{*/
					$pez=" AND activismo_index.user = '$user' or activismo_index.nombre LIKE '%".$criterio."%'";
//				}
				$celdas=array(0=>'id',1=>'user',2=>'rango');
				$set='if_activista_a.php';
				$ruta='bus_activista.php';
				$borra=1;
				$clPag = new paginacion();
				$clPag->cuantos($sql,$pez);
				$clPag->pagina($pag,$sql,$pez,$set,$borra,$celdas,$self);
				$clPag->pie($pag,$sql,$pez,$self);
	?>
		</div>
<?php
}else{
	echo "Usted no tiene acceso a esta seccción";
}
?>