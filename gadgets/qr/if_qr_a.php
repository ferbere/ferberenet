<?php
session_start();
include_once("library/tinymce.php");
include_once("library/confirm.php");
if(($_SESSION['privilegioss']=="ferbere")||($_SESSION['privilegioss']=="admin")||($_SESSION['privilegioss']=="directivo")){
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
		$link=Conectarse();
		if(isset($_GET['rubro'])){
			$rubro=$_GET['rubro'];
		}
		$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
		$url=mysql_fetch_array($sql_u);
		if($url[1]==''){
			$url_d='../'.$_SESSION["admin"].'/images/fotos/';
		}else{
			$url_d='http://'.$url[1].'/'.$_SESSION['admin'].'/images/fotos/';
		}
		$sql= mysql_query("SELECT id,qr,urls,descripcion FROM qr_index WHERE id = '$rubro' ",$link);
		while ($row = mysql_fetch_array($sql)){
			$id				=	$row[0];
			$qr				=	$row[1];
			$urls			=	$row[2];
			$descripcion	=	$row[3];
		}
?>
	<form method="post" action="gadgets/qr/ip_qr_a.php">
		<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
		<h1>Editar cita</h1>
		<img src="<?php echo $url_d.$qr; ?>.png" width="150px">
		<label>Nombre:</label>
		<input type="text" name="qr" value="<?php echo $qr ?>"/>
		<label>Url</label>
		<input type="text" name="urls" value="<?php echo $urls ?>"/>
		<label>Descripción</label>
		<textarea name="descripcion"><?php echo $descripcion ?></textarea>
		<input type="submit"  value="enviar">
	</form>
<?php
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
	echo "Usted no tiene acceso a esta sección";
}		
?>
