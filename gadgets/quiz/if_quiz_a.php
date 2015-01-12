<?php
session_start();
include("library/tinymce.php");
include("library/confirm.php");
if(($_SESSION['privilegioss']=="ferbere")||($_SESSION["privilegioss"]=="admin")){
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
			$url_d='../'.$_SESSION["admin"].'/images/encuesta/';
		}else{
			$url_d='http://'.$url[1].'/'.$_SESSION['admin'].'/images/encuesta/';
		}
?>
<div id="form-main">
	<form method="post" action="gadgets/quiz/ip_quiz_a.php" enctype="multipart/form-data">
 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">	
	<div id="maincontent-tit">
		Modificar cuestionario<br><br>
	</div>
		<div id="maincontent-body">
			<div id="mma">
<?php
	$sql=mysql_query("SELECT id,nombre,imagen,contenido,visible FROM quiz_index WHERE id = '$rubro' ",$link);
	while($row=mysql_fetch_array($sql)){
		$id 	 	= $row[0];
		$nombre  	= $row[1];
		$imagen  	= $row[2];
		$contenido  = $row[3];
		$visible 	= $row[4];

	}
?>
		<img src="<?php echo $url_d.$imagen; ?>" height="200px"><br>
		Nombre:<br>
		<input type="text" name="nombre" style="width:400px" value="<?php echo $nombre ?>"><br><br>
<?php
		if(empty($imagen)){?>
			Imagen: 
			<input type="file" name="imagen" ><br><br><br>

<?php		}else{?>
			Imagen: <b><?php echo $imagen; ?></b><br>
			<a href="gadgets/quiz/borra_imagen.php?borra=1&rubro=<?php echo $rubro; ?>">Borrar y cargar otra imagen</a><br><br><br>	
<?php } ?>
			Contenido:<br>
			<textarea name="contenido" rows=19 cols=80 width:300px height:40px><?php echo $contenido ?></textarea>

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
		No <input type="radio" name="visible" value="0" size="30" <?php echo $publino ?>>
		<br><br>
		<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
			</div>
				<div>
					<input type="submit"  value="enviar"><br><br>
			</form>
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
/*
$r=array(1='quiz_index',2='quiz_ques',3='quiz_answ');
include_once("classes/form_quiz.class.php");
$frm=new form();
$frm1=$frm->foRm_campo($r[2],2);
echo $frm1*/
?>