<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	include_once('../classes/conex.php');
	$link=Conectarse();
	include("../library/tinymce.php");
	include("../library/confirm.php");
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
	<div id="form-main">
		<form method="post" action="gadgets/articulos/ip_fotoedicion_a.php">
		<div id="maincontent-tit">
			Modificar Foto Edicion<br><br>
		</div>
			<div id="maincontent-body">
				<div>
					<input type="hidden" name="rubro" value="<? echo $rubro ?>">
<?php
		$sql=mysql_query("SELECT * FROM articulos_fotoedicion WHERE id = '$rubro'",$link);
		while($row=mysql_fetch_array($sql)){
			$id=$row['id'];
			$imagen=$row['imagen'];
			$paginas=$row['paginas'];
			$edicion=$row['edicion'];
		}
?>
					Imagen:<br>
					<input type="text" name="imagen" size="30" value="<?php echo $imagen ?>"><br><br>
					páginas:<br>
					<input type="text" name="paginas" size="30" value="<?php echo $paginas ?>"><br><br>
					Edición:<br>
					<select name="edicion">
<?php
$sqlCat=mysql_query("SELECT id,nombre FROM articulos_ediciones ORDER BY id ASC ",$link);
while($rowCat=mysql_fetch_array($sqlCat)){
	if($edicion!=$rowCat['id']){
		$cat= 'nain';
	}else{
		$cat="selected";
	}?>
	<option value="<?php echo $rowCat['id']; ?>"<?php echo $cat;?>>
		<?php echo $rowCat['nombre'];?>
	</option>
<?php }
?>
					</select>
				</div>
					<div>
						<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
						</form>
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