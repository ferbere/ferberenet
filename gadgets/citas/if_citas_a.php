<?php
session_start();
include("library/tinymce.php");
include("library/confirm.php");
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
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
	<form method="post" action="gadgets/citas/ip_citas_a.php">
	<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
<?php
		$sql= mysql_query("SELECT autor,contenido,visible FROM citas_index WHERE id = '$rubro' ",$link);
		while ($row = mysql_fetch_array($sql)){
			$autor		=	$row[0];
			$contenido	=	$row[1];
			$visible	=	$row[2];
		}
		?>
			<div id="maincontent-tit">
				Editar cita
			</div>
				<div id="maincontent-body">
					<div>
						Autor:<br></h1>
						<input type="text" name="autor" style="width:95%" value="<?php echo $autor ?>" /><br><br>
						Contenido:<br>
						<textarea name="contenido" rows=19 cols=80 width:300px height:40px><?php echo $contenido ?></textarea>
					<?php
		if($visible==1){
			$visi_no='nain';
			$visi_si='checked';
		}elseif($visible==0){
			$visi_no='checked';
			$visi_si='nain';

		}
		?>
						Visible:<br>
			<input type="radio" name="visible" value="0" <?php echo $visi_no ?>>No
			<input type="radio" name="visible" value="1" <?php echo $visi_si ?>>Sí<br>		
					</div>
						<div>
							<input type="submit"  value="enviar">
							</form>
						</div>
			</div>
</div>
<?php
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
echo "Usted no tiene acceso a esta sección";
}		
?>
