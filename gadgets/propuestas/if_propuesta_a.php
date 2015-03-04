<?php
session_start();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
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
		$sql=$mysql->consulta("SELECT id,nombre,texto,categoria,visible FROM propuesta_index WHERE id = '$rubro' ");
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

						Categoría<br>
						<select name="categoria">
<?php
	$sql_cat=$mysql->consulta("SELECT id,nombre FROM propuesta_categoria");
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