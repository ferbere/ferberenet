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
	<form method="post" action="gadgets/language/ip_content_a.php">
	<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
<?php
		$sql= mysql_query("SELECT language_content.titulo,language_content.subtitulo,language_content.nombre,language_content.imagen,language_index.nombre,language_content.vinculo,language_content.contenido,language_content.visible,language_content.secc_vincula FROM language_content INNER JOIN language_index ON language_content.idioma = language_index.id WHERE language_content.id = '$rubro' ",$link);
		while ($row = mysql_fetch_array($sql)){
			$titulo		=	$row[0];
			$subtitulo	=	$row[1];
			$nombre		=	$row[2];
			$imagen		=	$row[3];
			$idioma		=	$row[4];
			$vinculo	=	$row[5];
			$contenido	=	$row[6];
			$visible	=	$row[7];
			$secc_vincula=	$row[8];
		}
		?>
			<div id="maincontent-tit">
				Editar Contenido Traducido
			</div>
				<div id="maincontent-body">
						<img src="../images/articulo/<?php echo $imagen; ?>.jpg" >
					<br><br>
						Título:<br></h1>
						<input type="text" name="titulo" style="width:95%" value="<?php echo $titulo ?>" /><br><br>
						Subtítulo:<br>
						<input type="text" name="subtitulo" style="width:95%" value="<?php echo $subtitulo ?>"/>
						Nombre:<br>
						<input type="text" name="nombre" style="width:95%" value="<?php echo $nombre ?>"/>
						Imagen:<br>
						<input type="text" name="imagen" style="width:95%" value="<?php echo $imagen ?>"/>
						Idioma:<br>
						<select name="idioma">
<?php
$sqlIdio=mysql_query("SELECT id,nombre FROM language_index ORDER BY id ASC ",$link);
while($rowIdio=mysql_fetch_array($sqlIdio)){
if($idioma!=$rowIdio['nombre']){
$idio= 'nain';
}else{
$idio="selected";
}?>
<option value="<?php echo $rowIdio['id']; ?>"<?php echo $idio;?>>
<?php echo $rowIdio['nombre'];?>
</option>
<?php }
?>
						</select><br><br>
						Vínculo:<br>
						<input type="text" name="vinculo" value="<?php echo $vinculo;?>"><br><br>
						Sección Vinculada
						<input type="text" name="secc_vincula" value="<?php echo $secc_vincula;?>"><br><br>

						Contenido:<br>
						<textarea name="contenido" rows=19 cols=80 width:300px height:40px><?php echo $contenido ?></textarea>
			<?php
			if($visible==0){
			$visino="checked";
			$visisi="nain";
			}elseif($visible==1){
			$visino="nain";
			$visisi="checked";
			}
			?>
						visible:<br>
						Sí <input type="radio" name="visible" value="1" size="30" <?php echo $visisi ?>>
						No <input type="radio" name="visible" value="0" size="30" <?php echo $visino ?>><br><br>
							<input type="submit"  value="enviar">
							</form>
						</div>
<?php
	}else{
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}
}else{
echo "Usted no tiene acceso a esta sección";
}		
?>
