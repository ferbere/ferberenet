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
	if($capturado==''){
?>
<div id="form-main">
	<form method="post" action="gadgets/catalogo/ip_catalogo.php" enctype="multipart/form-data">
   	 <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
	<div id="maincontent-tit">
		Agregar catálogo<br><br>
	</div>
		<div id="maincontent-body">
			<table>
				<tr>
					<td>
                    Nombre:<br>
					<input type="text" name="nombre" size="40%"><br><br>
                    Subnombre:<br>
					<input type="text" name="subnombre" size="60%"><br><br>
<?php
		if($visible==1){
			$vis_si='checked';
			$vis_no='nain';
		}elseif($visible==0){
			$vis_si='nain';
			$vis_no='checked';

		}
?>
				Visible:
				<input type="radio" name="visible" value="1" <?php echo $vis_si ?>>Sí
				<input type="radio" name="visible" value="0" <?php echo $vis_no ?>>No<br><br>
				Categoría:<br><br>
				<select name="categoria">
<?php
$sqlCat=mysql_query("SELECT id,nombre FROM catalogo_categoria ORDER BY id ASC ",$link);
while($rowCat=mysql_fetch_array($sqlCat)){
	echo '<option value="'.$rowCat['id'].'">'.$rowCat['nombre'].'</option>';						}
?>
				</select><br><br>
		</td>
	</tr>
	<tr>
		<td>
				Descripción:<br>
				<textarea name="descripcion" rows=10 cols=80 ></textarea><br><br>
				Imagen:<br>
				<input type="file" name="imagen">
<br><br>
				Existencias:<br>
				<input type="number" name="existe">
<br><br>
                  Precio:<br>$<input type="text" name="precio" size="30%"><br><br>                        
                  Dimensiones:<br><input type="text" name="dimensiones" size="30%"><br><br>                        
                  Orden:<br><input type="text" name="orden" size="30%"><br><br>
			</div>
					<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
	</form>
		</td>
	</tr>
</table>
</div>
</div>
<?php
	}elseif($capturado==0){
		echo "Algo pasó. Así nomás, algo pasó y nada se capturó.";
	}elseif($capturado==1){
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}elseif($capturado==2){
		echo "Se ha capturado el contenido. No había archivo que subir al servidor.";
	}elseif($capturado==3){
		echo "No se ha capturado el contenido porque el archivo no se ha podido subir al servidor.";
	}
}else{
	echo "Usted no tiene acceso a esta seccción";
}
 ?>