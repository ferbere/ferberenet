<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	$link=Conectarse();
	include("../library/tinymce.php");
	include("../library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
	if(empty($capturado)){
		$sql=mysql_query("SELECT id,diputado,iniciativa,suscribe FROM perfil_asigna_iniciativa WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
			$id=$row[0];
			$diputado=$row[1];
			$iniciativa=$row[2];
			$suscribe=$row[3];
		}
	?>
		<div id="form-main">
			<form method="post" action="gadgets/perfil/ip_asigna_iniciativa_a.php">
			<div id="maincontent-tit">
				Modificar asignación de Iniciativa<br><br>
			</div>
				<div id="maincontent-body">
					<div>
						Diputado:<br>
			<select name="diputado">
<?php
	$sql_dipu=mysql_query("SELECT id,nombre FROM perfil_index ORDER BY id ASC",$link);
	while ($row_dipu=mysql_fetch_array($sql_dipu)){
		if($diputado!=$row_dipu[0]){
			$dip='nain';
		}else{
			$dip='selected';
		}
		echo '<option value="'.$row_dipu[0].'"'.$dip.'>'.$row_dipu[1].'</option>';
	}
?>
			</select><br><br>
			
						Iniciativa:<br>
			<select name="iniciativa">
<?php
	$sql_comi=mysql_query("SELECT id,nombre FROM perfil_iniciativa ORDER BY id ASC",$link);
	while ($row_comi=mysql_fetch_array($sql_comi)){
		if($iniciativa!=$row_comi[0]){
			$com='nain';
		}else{
			$com='selected';
		}
		echo '<option value="'.$row_comi[0].'"'.$com.'>'.$row_comi[1].'</option>';
	}
?>
			</select><br><br>
<?php
		if($suscribe==1){
			$pre_si='checked';
			$pre_no='nain';
		}elseif($suscribe==0){
			$pre_si='nain';
			$pre_no='checked';

		}
?>
				Suscribe<input type="radio" name="suscribe" value="1" <?php echo $pre_si ?>>
				Apoya<input type="radio" name="suscribe" value="0" <?php echo $pre_no ?>><br><br>
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