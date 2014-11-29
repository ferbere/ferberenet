<?php
session_start();
if($_SESSION["privilegioss_id"]<4){
	include_once('classes/mysql.php');
	$mysql=new MySQL();
	include("library/tinymce.php");
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if($capturado==''){
?>
		<div id="form-main">
			<form method="post" action="gadgets/catalogo/ip_masfotos.php" enctype="multipart/form-data">
		   	 <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
			<div id="maincontent-tit">
				Agregar Foto
			</div>
				<div id="maincontent-body">
					<div>
                        Nombre:<br>
			<input type="text" name="nombre" size="80%"><br><br>
                        Visible:
			<input type="radio" name="visible" value="0">No  
			<input type="radio" name="visible" value="1" checked>S&iacute;<br><br>
                        Descripci&oacute;n:<br>
			<textarea name="descripcion" rows=10 cols=80 ></textarea><br><br>
                        Imagen:<br>
			<input type="file" name="imagen">
			<br><br>
						Imagen vinculada a:
<?php
			$sql=$mysql->consulta("SELECT id,nombre FROM catalogo_index");
?>
			<select name="vincula">
				<?php
				while($row=$mysql->fetch_array($sql)){
					echo 	'<option value="'.$row[0].'">'.$row[1].'</option>';
				} ?>
			</select><br><br>
						Orden:
			<input type="number" name="orden"><br><br>

					</div>
						<div>
							<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
		</form>
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