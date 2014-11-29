<?php
session_start();
include("../library/tinymce.php");
include("../library/confirm.php");
if($_SESSION['privilegioss']=="ferbere"){
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
		$link=Conectarse();
		if(isset($_GET['rubro'])){
			$rubro=$_GET['rubro'];
		}
?>
		<div id="form-main">
			<form method="post" action="gadgets/patrocinador/ip_patrocinador_a.php">
			<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
<?php
$sql= mysql_query("SELECT * FROM patrocinador_index WHERE id = '$rubro' ",$link);
while ($row = mysql_fetch_array($sql)){
	$nombre=$row['nombre'];
	$ruta=$row['ruta'];
	$contenido=$row['contenido'];
	$localidad=$row['localidad'];
	$imagen=$row['imagen'];
?>
	<div id="maincontent-tit">
		Editar patrocinador
	</div>
		<div id="maincontent-body">
			<div>
					Nombre<br>
				<input type="text" name="nombre" style="width:95%" value="<?php echo $row['nombre'] ?>" />
					Ruta:<br>
				<input type="text" name="ruta" style="width:95%" value="<?php echo $row['ruta'] ?>" />
					Imagen:
				<input type="text" name="imagen" size="30" value="<?php echo $row['imagen'] ?>" /><br><br>
					Contenido:<br><textarea name="contenido" rows=19 cols=70 width:300px height:40px><?php echo $row['contenido'] ?>
					</textarea><br><br>
<?php
	if($row['visible']==0){
		$publino="checked";
		$publisi="nain";
	}elseif($row['visible']==1){
		$publino="nain";
		$publisi="checked";
	}
?>
					visible:<br>
					Sí <input type="radio" name="visible" value="1" size="30" <?php echo $publisi ?>>
					No <input type="radio" name="visible" value="0" size="30" <?php echo $publino ?>>
					</div>
						<div>
							<input type="submit"  value="enviar">
							</form>
						</div>

<?php
	}
?>
				</div>
	</div>
<?
}else{
	echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
}
}else{
echo "Usted no tiene acceso a esta sección";
}
?>
