<?php
session_start();
if($_SESSION["privilegioss_id"]<4){
	include_once('classes/mysql.php');
	$mysql=new MySQL();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}

	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if($capturado==''){
		$sql=$mysql->consulta("SELECT id,nombre,descripcion,imagen,visible,vincula,orden FROM catalogo_masfotos WHERE id = '$rubro' ");
		while($row=$mysql->fetch_array($sql)){
			$id 			= $row[0];
			$nombre 		= $row[1];
			$descripcion	= $row[2];
			$imagen 		= $row[3];
			$visible 		= $row[4];
			$vincula 		= $row[5];
			$orden 			= $row[6];
		}
		$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
		$url=mysql_fetch_array($sql_u);
		if(empty($url[1])){
			$url_c='http://localhost/';
		}else{
			$url_c='http://'.$url[1].'/';
		}
		$path=$url_c.$_SESSION['admin'].'/images/catalogo/';
?>
		<div id="form-main">
			<img src="<?php echo $path.$imagen; ?>" height="200px"><br>
			<form method="post" action="gadgets/catalogo/ip_masfotos_a.php" enctype="multipart/form-data">
		   	 <input type="hidden" name="rubro" value="<?php echo $rubro ?>">
		   	 <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
			<div id="maincontent-tit">
				Editar foto adicional
			</div>
				<div id="maincontent-body">
					<div>
                        Nombre:<br>
			<input type="text" name="nombre" size="80%" value="<?php echo $nombre; ?>"><br><br>
	<?php
		if($visible==1){
			$visi='checked';
			$vino='nain';
		}elseif($visible==0){
			$visi='nain';
			$vino='checked';
		}
	?>

                        Visible:
			<input type="radio" name="visible" value="0" <?php echo $vino ?>>No  
			<input type="radio" name="visible" value="1" <?php echo $visi ?>>S&iacute;<br><br>
                        Descripci&oacute;n:<br>
			<textarea name="descripcion" rows=10 cols=80 ><?php echo $descripcion; ?></textarea><br><br>
<?php
		if(empty($imagen)){?>
			Imagen: 
			<input type="file" name="imagen" ><br><br><br>

<?php	}else{?>
			Imagen: <b><?php echo $imagen; ?></b><br>
			<a href="gadgets/catalogo/borra_imagen.php?borra=2&rubro=<?php echo $rubro; ?>">Borrar y cargar otra imagen</a><br><br><br>	
<?php 	} ?>			

						Imagen vinculada a:
<?php
			$sql2=$mysql->consulta("SELECT id,nombre FROM catalogo_index");
?>
			<select name="vincula">
		<?php
		while($row2=$mysql->fetch_array($sql2)){
			if($vincula==$row2[0]){
				$vin='selected';
			}else{
				$vin='nain';
			}
			echo 	'<option value="'.$row2[0].'" '.$vin.'>'.$row2[1].'</option>';
		} ?>
			</select><br><br>
						Orden:
			<input type="number" name="orden" value="<?php echo $orden; ?>"><br><br>
					</div>
						<div>
							<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
		</form>
					</div>
	</div>
<?php
	}elseif($capturado==0){
		echo "Algo pasó. Así nomás, algo pas&oacute; y nada se captur&oacute;.";
	}elseif($capturado==1){
		echo "El contenido ha sido capturado, debidamente. Muy bien!";
	}elseif($capturado==2){
		echo "Se ha capturado el contenido. No hab&iacute;a archivo que subir al servidor.";
	}elseif($capturado==3){
		echo "No se ha capturado el contenido porque el archivo no se ha podido subir al servidor.";
	}
}else{
	echo "Usted no tiene acceso a esta seccci&oacute;n";
}
 ?>