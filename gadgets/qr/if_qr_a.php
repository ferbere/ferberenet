<?php
session_start();
include_once("library/tinymce.php");
include_once("library/confirm.php");
if(($_SESSION['privilegioss']=="ferbere")||($_SESSION['privilegioss']=="admin")){
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
	<form method="post" action="gadgets/qr/ip_qr_a.php">
	<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
<?php
$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
		$url=mysql_fetch_array($sql_u);
		if(empty($url[1])){
			$url_c='http://localhost/';
		}else{
			$url_c='http://'.$url[1].'/';
		}
		$path=$url_c.$_SESSION['admin'].'/images/fotos/';

		$sql= mysql_query("SELECT id,qr,url,descripcion FROM qr_index WHERE id = '$rubro' ",$link);
		while ($row = mysql_fetch_array($sql)){
			$id				=	$row[0];
			$qr				=	$row[1];
			$url			=	$row[2];
			$descripcion	=	$row[3];
		}
		?>
			<div id="maincontent-tit">
				Editar cita
			</div>
				<div id="maincontent-body">
					<div>
						<div style="text-align:center"><br><br>
							<img src="<?php echo $path.$qr ?>.png"><br><br>
						</div>
						Nombre:<br></h1>
						<input type="text" name="qr" style="width:95%" value="<?php echo $qr ?>" /><br><br>
						Url:<br></h1>
						<input type="text" name="url" style="width:95%" value="<?php echo $url ?>" /><br><br>
						Descripcion:<br>
						<textarea name="descripcion" rows=19 cols=80 width:300px height:40px><?php echo $descripcion ?></textarea>
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
