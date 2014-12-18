<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	include_once("classes/mysql.php");
	$mysql=new MySQL();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
	if(empty($capturado)){
		$sql=$mysql->consulta("SELECT id,nombre,texto,categoria,visible FROM perfil_iniciativa WHERE id = '$rubro' ");
		while($row=$mysql->fetch_array($sql)){
			$id			= $row[0];
			$nombre		= $row[1];
			$texto		= $row[2];
			$categoria	= $row[3];
			$visible 	= $row[4];
		}
	?>
		<div id="form-main">
			<form method="post" action="gadgets/propuestas/ip_iniciativa_a.php">
			<div id="maincontent-tit">
				Modificar Propuesta<br><br>
			</div>
				<div id="maincontent-body">
					<div>
						Nombre:<br>
						<input type="text" name="nombre" size="112" value="<?php echo $nombre; ?>"><br><br>
						Texto:<br>
						<textarea name="texto" rows="30" cols="20"> <?php echo $texto; ?></textarea><br><br>
						<h2>Asignada a:</h2>
	<table>
<?php
if(isset($_GET['imag'])){
	$imag=$_GET['imag'];
}
if(empty($imag)){
	$imag=0;
}
if(isset($_GET['asig'])){
	$asig=$_GET['asig'];
}
if(empty($asig)){
	$asig=1;
}

$sql_asigna=$mysql->consulta("SELECT id,diputado,suscribe FROM perfil_asigna_iniciativa WHERE iniciativa = '$rubro' ");
$cuenta_asigna=$mysql->num_rows($sql_asigna);
//	$asigna_test=array();
while($row_asigna=$mysql->fetch_array($sql_asigna)){
//	$asigna_test[$row_asigna[1]]=array($row_asigna[1]=>$row_asigna[2]);
	$asigna_test[$row_asigna[1]]=$row_asigna[1];
	$suscribe_test[$row_asigna[1]]=$row_asigna[2];
}
$i=1;
$sql_perfil=$mysql->consulta("SELECT id,nombre FROM perfil_index WHERE id > 0");
while($row_perfil=$mysql->fetch_array($sql_perfil)){
		if($row_perfil[0]!=$asigna_test[$i]){
			$imag=0;
			$asig=1;
//			$susc=
		}else{
			$imag=1;
			$asig=0;
			if($suscribe_test[$i]==0){
				$susc=1;
				$susc_img=0;
			}else{
				$susc=0;
				$susc_img=1;
			}
		}
		echo '<tr>';
		echo '<td>';
		echo 	'<a href="gadgets/propuestas/if_asig.php?rubro='.$rubro.'&diputado='.$row_perfil[0].'&asigna='.$asig.'">';
		echo 		'<img src="../style/images/asigna_'.$imag.'.gif">';
		echo 	'</a> '.$row_perfil[1];
		echo '</td>';
			if($asigna_test[$i]!=''){
				echo '<td>';
				echo 	'Suscribe: <a href="gadgets/propuestas/if_asig.php?rubro='.$rubro.'&diputado='.$row_perfil[0].'&suscribe='.$susc.'">';
				echo 		'<img src="../style/images/asigna_'.$susc_img.'.gif">';
				echo 	'</a>';
				echo '</td>';
			}	echo '</tr>';
			$i++;
}
?>
</table>	
<br><br>
						Categoría<br>
						<select name="categoria">
<?php
	$sql_cat=$mysql->consulta("SELECT id,nombre FROM perfil_iniciativa_cat");
	while($row_cat=$mysql->fetch_array($sql_cat)){
		if($categoria != $row_cat[0]){
			$hig='nain';
		}else{
			$hig='selected';
		}
		echo '<option value="'.$row_cat[0].'"'.$hig.'>'.$row_cat[1].'</option>';
	}
?>
						</select><br><br>
<?php
		if($visible==1){
			$vis_si='checked';
			$vis_no='nain';
		}elseif($visible==0){
			$vis_si='nain';
			$vis_no='checked';

		}
?>
						Visible:
					<input type="radio" name="visible" value="1" <?php echo $vis_si ?>>Sí
					<input type="radio" name="visible" value="0" <?php echo $vis_no ?>>No<br><br>
						<input type="hidden" name="rubro" value="<?php echo $rubro ?>"><br><br>
					</div>
						<div>
							<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
							</form>
						</div>
				</div>
		</div>
		<?php
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
echo "Usted no tiene acceso a esta seccción";
}
?>