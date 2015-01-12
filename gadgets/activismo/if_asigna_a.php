<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	$link=Conectarse();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
	if(empty($capturado)){
		$sql=mysql_query("SELECT id,diputado,boton_social,cuenta,url FROM perfil_asigna_boton WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
			$id				=	$row[0];
			$diputado		=	$row[1];
			$boton_social	=	$row[2];
			$cuenta			=	$row[3];
			$url	=			$row[4];
		}
	?>
		<div id="form-main">
			<form method="post" action="gadgets/perfil/ip_asigna_boton_a.php">
			<div id="maincontent-tit">
				Modificar Asignación de Comisiones<br><br>
			</div>
				<div id="maincontent-body">
					<div>
						Candidato:<br>
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
			
						Botón social:<br>
			<select name="boton_social">
<?php
	$sql_comi=mysql_query("SELECT id,nombre FROM perfil_boton_social ORDER BY id ASC",$link);
	while ($row_comi=mysql_fetch_array($sql_comi)){
		if($boton_social!=$row_comi[0]){
			$com='nain';
		}else{
			$com='selected';
		}
		echo '<option value="'.$row_comi[0].'"'.$com.'>'.$row_comi[1].'</option>';
	}
?>
			</select><br><br>
				Cuenta:
				<input type="text" name="cuenta" value="<?php echo $cuenta ?>"><br>
				URL:
				<input type="text" name="url" value="<?php echo $url ?>"><br>
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