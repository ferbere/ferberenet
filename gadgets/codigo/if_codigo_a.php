<?php
session_start();
include("library/confirm.php");
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
			<form method="post" action="gadgets/codigo/ip_codigo_a.php" name="fvalida">
			<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
<?php
$sql= mysql_query("SELECT id,nombre,contenido,categoria FROM codigo_index WHERE id = '$rubro' ",$link);
while ($row = mysql_fetch_array($sql)){
	$id 	= $row[0];
	$nombre 	= $row[1];
	$contenido 	= $row[2];
	$categoria 	= $row[3];
?>
	<div id="maincontent-tit">
		Editar código
	</div>
		<div id="maincontent-body">
			<div>
					Nombre<br>
				<input type="text" name="nombre" style="width:95%" value="<?php echo $nombre ?>" /><br><br>

					Sección:
					<select name="categoria">
<?php
$sqlCat=mysql_query("SELECT id,nombre FROM codigo_categoria ORDER BY id ASC ",$link);
while($rowCat=mysql_fetch_array($sqlCat)){
	if($categoria!=$rowCat[0]){
		$cat= 'nain';
	}else{
		$cat="selected";
	}?>
	<option value="<?php echo $rowCat[0]; ?>"<?php echo $cat;?>>
		<?php echo $rowCat[1];?>
	</option>
<?php }
?>
					</select><br><br>


					Contenido:<br><textarea name="contenido" rows=19 cols=70 width:300px height:40px><?php echo $contenido ?>
					</textarea><br><br>
			</div>
			<div>
				<input type="submit"  value="guardar">
				</form>
			</div>
<?php } ?>
		</div>
	</div>
<?
}else{
	echo "El contenido ha sido capturado, debidamente. ?Muy bien!";
}
}else{
echo "Usted no tiene acceso a esta secci?n";
}
?>
