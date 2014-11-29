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
			<form method="post" action="gadgets/proyectos/ip_proyectos_a.php">
			<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
<?php
$sql= mysql_query("SELECT * FROM proyectos_index WHERE id = '$rubro' ",$link);
while ($row = mysql_fetch_array($sql)){
$bole=$row["id"]; 
$seccion=$row['seccion'];
?>
	<div id="maincontent-tit">
		Editar artículo
	</div>
		<div id="maincontent-body">
			<div>
					Título<br>
				<input type="text" name="titulo" style="width:95%" value="<?php echo $row['titulo'] ?>" />
					Cliente:<br>
				<input type="text" name="cliente" style="width:95%" value="<?php echo $row['cliente'] ?>" />
					Fecha:
				<input type="text" name="fecha" size="30" value="<?php echo $row['fecha'] ?>" /><br><br>
					Proyecto:<br>
				<input type="text" name="proyecto" size="30" value="<?php echo $row['proyecto'] ?>" /><br><br>
					Contenido:<br><textarea name="contenido" rows=19 cols=70 width:300px height:40px><?php echo $row['contenido'] ?>
					</textarea><br><br>
<?php
	if($row['publicado']==0){
		$publino="checked";
		$publisi="nain";
	}elseif($row['publicado']==1){
		$publino="nain";
		$publisi="checked";
	}
?>
					Publicado:<br>
					Sí <input type="radio" name="publicado" value="1" size="30" <?php echo $publisi ?>>
					No <input type="radio" name="publicado" value="0" size="30" <?php echo $publino ?>>
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
