<?php
include_once('classes/mysql.php');
$mysql = new MysQL();
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(isset($_GET['codigo'])){
		$codigo=$_GET['codigo'];
	}
		$codigo='SELECT id,edicion,fecha FROM articulos_index WHERE edicion = 59';
	if(empty($capturado)){
			echo $codigo.'<br><br>';
			echo '<a href="socialmedia.php?ruta=run_query.php&capturado=1">Ejecuta?</a>';
	}elseif($capturado==1){
		$e=673;
		for($i=1;$i<=16;$i++){
			$sql = $mysql->consulta('UPDATE articulos_index SET orden = '.$i.' WHERE id = '.$e);
//			echo 'UPDATE articulos_index SET orden = '.$i.' WHERE id = '.$e.'<br>';

/*			while ($row=$mysql->fetch_array($sql)){
				echo $row[0].' '.$row[1].' '.$row[2].'<br>';
			}*/
			$e=$e+1;
		}
	}


?>