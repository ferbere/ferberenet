<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	include_once('classes/conex.php');
	$link=Conectarse();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
	if(empty($capturado)){

		$sql_u=mysql_query("SELECT url,pagina FROM template_general",$link);
		$url=mysql_fetch_array($sql_u);
		if($url[1]==''){
			$url_d='../'.$_SESSION["admin"].'/images/testimonios/';
		}else{
			$url_d='http://'.$url[1].'/'.$_SESSION['admin'].'/images/testimonios/';
		}

$sql= mysql_query("SELECT id,titulo,contenido,fecha,orden,imagen,visible FROM testimonios_index WHERE id = '$rubro' ",$link);
while ($row = mysql_fetch_array($sql)){
	$id=$row[0]; 
	$titulo=$row[1];
	$contenido=$row[2];
	$fecha=$row[3];
	$orden=$row[4];
	$imagen=$row[5];
	$visible=$row[6];
}
?>
	<div id="form-main">
	<form method="post" action="gadgets/testimonios/ip_testimonios_a.php" enctype="multipart/form-data">
 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
	<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
		<div id="maincontent-tit">
			Modificar testimonio<br><br>
		</div>
			<div id="maincontent-body">
				<div>
					<img src="<?php echo $url_d.$imagen; ?>" height="200px"><br>
					Título:<br>
						<input type="text" name="titulo" style="width:95%" value="<?php echo $titulo ?>" /><br>
					<?php
		if(empty($imagen)){?>
			Imagen: 
			<input type="file" name="imagen" ><br><br><br>

<?php		}else{?>
			Imagen: <b><?php echo $imagen; ?></b><br>
			<a href="gadgets/testimonios/borra_imagen.php?rubro=<?php echo $rubro; ?>">Borrar y cargar otra imagen</a><br><br><br>	
<?php } ?>			

<?php
if($visible==0){
	$publino="checked";
	$publisi="nain";
}elseif($visible==1){
	$publino="nain";
	$publisi="checked";
}
?>
						Publicado:<br>
						Sí <input type="radio" name="visible" value="1" size="30" <?php echo $publisi ?>>
						No <input type="radio" name="visible" value="0" size="30" <?php echo $publino ?>><br>
						Contenido:<br>
						<textarea name="contenido" rows=19 cols=70 width:300px height:40px>
							<?php echo $contenido; ?>
						</textarea><br>
				</div>
					<div>
						<input type="submit"  value="enviar"></form></td>
					</div>
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
