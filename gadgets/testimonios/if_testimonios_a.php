<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	include_once('../classes/conex.php');
	$link=Conectarse();
	include("../library/tinymce.php");
	include("../library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
	if(empty($capturado)){
$sql= mysql_query("SELECT * FROM testimonios_index WHERE id = '$rubro' ",$link);
while ($row = mysql_fetch_array($sql)){
$bole=$row["id"]; 
$seccion=$row['seccion'];
?>
	<div id="form-main">
		<form method="post" action="gadgets/testimonios/ip_testimonios_a.php">
		<input type="hidden" name="rubro" value="<?php echo $rubro ?>"><br><br>
		<div id="maincontent-tit">
			Modificar catálogo<br><br>
		</div>
			<div id="maincontent-body">
				<div>
					Título:<br>
						<input type="text" name="titulo" style="width:95%" value="<?php echo $row['titulo'] ?>" /><br>
					Imagen:<br>
						<input type="text" name="imagen" style="width:95%" value="<?php echo $row['imagen'] ?>" /><br>

<?php
if($row['visible']==0){
$publino="checked";
$publisi="nain";
}elseif($row['visible']==1){
$publino="nain";
$publisi="checked";
}
?>
						Publicado:<br>
						Sí <input type="radio" name="visible" value="1" size="30" <?php echo $publisi ?>>
						No <input type="radio" name="visible" value="0" size="30" <?php echo $publino ?>><br>
						Contenido:<br><textarea name="contenido" rows=19 cols=70 width:300px height:40px><?php echo $row['contenido']
?></textarea><br>
				</div>
					<div>
						<input type="submit"  value="enviar"></form></td>
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
