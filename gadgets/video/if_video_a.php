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
		$sql=mysql_query("SELECT * FROM video_index WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
	?>
		<div id="form-main">
			<form method="post" action="gadgets/video/ip_video_a.php">
			<div id="maincontent-tit">
				Modificar Videos<br><br>
			</div>
				<div id="maincontent-body">
					<div style="border:0px solid; height:100%">
						<div style="width:600px; text-align:center">
							<video width="320" height="240" controls="controls">
							  	<source src="../images/<?php echo $row['liga']?>.mov"  />
							</video>						
						</div>
							<div style="padding-left:50px">
								Nombre:<br>
				<input type="text" name="nombre" size="60" value="<?php echo $row['nombre']; ?>"><br>
								Fecha:<br>
				<input type="text" name="fecha" size="30" value="<?php echo $row['fecha']; ?>"><br>
								Liga:<br>
				<input type="text" name="liga" size="20" value="<?php echo $row['liga']; ?>"><br><br>
						<!--		Medio:<br>
				<select name="medio">
					<option value="0">Ninguno</option>
<?php
		$sql_medio=mysql_query("SELECT id,nombre FROM prensa_medios",$link);
		while($row_medio=mysql_fetch_array($sql_medio)){
			if($row['medio']==$row_medio['id']){
				$selected='selected';
			}else{
				$selected='nain';
			}
			echo '<option value="'.$row_medio["id"].'"'.$selected.'>'.$row_medio['nombre'].'</option>';
	
		}
		?>
						</select>
		<br>
				<?php
				if($row['visible']==1){
					$visi_no='nain';
					$visi_si='checked';
				}elseif($row['visible']==0){
					$visi_no='checked';
					$visi_si='nain';

				}
				?>-->
								Visible:<br>
					<input type="radio" name="visible" value="0" <?php echo $visi_no ?>>No
					<input type="radio" name="visible" value="1" <?php echo $visi_si ?>>Sí<br>			
					<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
				</div>
							<div style="clear:both; text-align:center">
								<br><br>Descripción:<br>
				<textarea name="descripcion" rows=19 cols=70 width:300px height:40px><?php echo $row['descripcion'] ?></textarea><br><br>
				<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
				</form>
							</div>
						</div>
								<div>
								</div>
			</div>
<?php
		}//Termina while(principal)
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
	echo "Usted no tiene acceso a esta seccción";
}
?>