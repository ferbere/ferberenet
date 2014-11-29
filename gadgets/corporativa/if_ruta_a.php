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
		$sql=mysql_query("SELECT * FROM corporativa_rutas WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
			$nombre=$row['nombre'];
			$imagen=$row['imagen'];
			$belong=$row['belong'];
		}
	?>
		<div id="form-main">
			<form method="post" action="gadgets/corporativa/ip_ruta_a.php">
			<div id="maincontent-tit">
				Modificar Ruta<br><br>
			</div>
				<div id="maincontent-body">
					<div>
						Nombre:<br>
						<input type="text" name="nombre" size="30" value="<?php echo $nombre; ?>"><br><br>
						Imagen:<br><input type="text" name="imagen" size="30" value="<?php echo $imagen; ?>">.jpg<br><br>
						Pertenece a: <select name="belong">
							<option value="0">ninguno</a>
						<?php
						$sql_bel=mysql_query("SELECT * FROM gadgets_botones WHERE id = 4 OR id > 5",$link);
						while ($row_bel=mysql_fetch_array($sql_bel)){
							if($row_bel['id']!=$belong){
								$hig='nain';
							}else{
								$hig='selected';
							}
							echo '<option value="'.$row_bel['id'].'"'.$hig.'>'.$row_bel['nombre'].'</a>';
						}
						?>
						</select>
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