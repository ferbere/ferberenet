<?php
include_once("classes/path.class.php");
$pth=new path();
$url = $pth->the_path();

//$path  = $url[0].'/'.$url[1].$_SESSION['admin'].'/respaldos/';
$path='../'.$url[1].$_SESSION['admin'].'/respaldos/';
$path2 = 'http://'.$url[1].$_SESSION['admin'].'/respaldos/';
$directorio = opendir($path); //ruta actual
	while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
	{
	    if (is_dir($archivo))//verificamos si es o no un directorio
	    {
	//        echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
	    }
	    else
	    {
			$pedazos = explode('.', $archivo);
			$total = count($pedazos);
			$archivo_fin = $pedazos[$total-1];
			if($archivo_fin=='sql'){
				echo '<a href="'.$path2.'descargar.php?f='.$archivo.'">'.$archivo . "</a><br />";
			}
	    }
	}
?>