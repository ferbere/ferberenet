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
	<h1>Edita activista</h1>
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
			mysql_query('set @numero=0');
			$sql = "SELECT @numero:=@numero+1 AS orden,activismo_index.user,activismo_rango.nombre,activismo_index.id FROM activismo_index INNER JOIN activismo_rango ON activismo_index.rango = activismo_rango.id WHERE activismo_index.rango > 0 ";
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
			$order=' ORDER BY orden DESC LIMIT ';
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