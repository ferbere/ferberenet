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
		<form method="post" action="gadgets/articulos/ip_resaque_a.php">
		<div id="maincontent-tit">
			Modificar resaque<br><br>
		</div>
			<div id="maincontent-body">
				<div>
					<form method="post" action="gadgets/articulos/ip_resaque_a.php">
					<input type="hidden" name="rubro" value="<? echo $rubro ?>">
<?php
		$sql=mysql_query("SELECT * FROM articulos_resaque WHERE id = '$rubro'",$link);
		while($row=mysql_fetch_array($sql)){
			$id=$row['id'];
			$nombre=$row['nombre'];
			$contenido=$row['contenido'];
			$vincula=$row['vincula'];
		}
?>
					Nombre:<br>
					<input type="text" name="nombre" size="30" value="<?php echo $nombre ?>"><br><br>
					Contenido:<br>
					<textarea name="contenido" rows=19 cols=70 width:300px height:40px><?php echo $contenido ?></textarea>
					Vincula:<br>
					<input type="text" name="vincula" value="<?php echo $vincula  ?>"><br><br>
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