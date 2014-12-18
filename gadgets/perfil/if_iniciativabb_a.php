<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	include_once("../classes/mysql.php");
	$mysql=new MySQL();
	include("../library/tinymce.php");
	include("../library/confirm.php");
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
			<form method="post" action="gadgets/perfil/ip_iniciativa_a.php">
			<div id="maincontent-tit">
				Modificar iniciativa<br><br>
			</div>
				<div id="maincontent-body">
					<div>
						Nombre:<br>
						<input type="text" name="nombre" size="112" value="<?php echo $nombre; ?>"><br><br>
						Texto:<br>
						<textarea name="texto" rows="30" cols="20"> <?php echo $texto; ?></textarea><br><br>
						<h2>Asignada a:</h2>
<table>
	<tr>
		<td style="border:1px dotted">Diputado</td>
		<td style="border:1px dotted">Suscribe</td>
		<td style="border:1px dotted">Apoya</td>
		<td style="border:1px dotted">Ninguna<br> de las dos</td>
	</tr>
<?php
$sql_asigna=$mysql->consulta("SELECT id,diputado,suscribe FROM perfil_asigna_iniciativa WHERE iniciativa = '$rubro' ");
$cuenta_asigna=$mysql->num_rows($sql_asigna);
	$asigna_test=array();
while($row_asigna=$mysql->fetch_array($sql_asigna)){
	$asigna_test[$row_asigna[1]]=	$row_asigna[2];
}
$i=1;
$sql_perfil=$mysql->consulta("SELECT id,nombre FROM perfil_index WHERE id > 0");
while($row_perfil=$mysql->fetch_array($sql_perfil)){
		echo '<tr>';
		echo 	'<td style="border-bottom:1px dotted">';
			echo '</a> '.$row_perfil[1];
		echo 	'</td>';
		echo 	'<td style="border-bottom:1px dotted" align="center">';
		if($asigna_test[$i]==''){
			$susc_si='nain';
			$susc_no='nain';
			$susc_none='checked';
		}elseif($asigna_test[$i]==0){
			$susc_si='nain';
			$susc_no='checked';	
			$susc_none='none';		
		}elseif($asigna_test[$i]==1){
			$susc_si='checked';
			$susc_no='nain';
			$susc_none='none';
		}

		echo '<input type="radio" name="dip'.$row_perfil[0].'" value="1" '.$susc_si.'>';
		echo '</td>';
		echo '<td style="border-bottom:1px dotted" align="center">';
		echo '<input type="radio" name="dip'.$row_perfil[0].'" value="0" '.$susc_no.'>';
		echo 	'</td>';
		echo '</tr>';
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