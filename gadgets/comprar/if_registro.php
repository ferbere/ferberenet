<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	include_once('classes/conex.php');
	$link=Conectarse();
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
			$sql=mysql_query("SELECT id,nombre FROM catalogo_index",$link);
			$sql_dir=mysql_query("SELECT id,name FROM comprar_directorio",$link);
?>
		<div id="form-main">
		<form method="post" action="gadgets/comprar/ip_registro.php">
			<div id="maincontent-tit">
				Agregar movimiento
			</div>
				<div id="maincontent-body">
					<div>
						Villa:<br>
			<select name="catalogo">
<?php
	while ($row=mysql_fetch_array($sql)){
		echo '<option value="'.$row[0].'">'.$row[1].'</a>';
	}
?>
			</select><br><br>
						Cliente:<br>
			<select name="cliente">
<?php
	while ($row_dir=mysql_fetch_array($sql_dir)){
		echo '<option value="'.$row_dir[0].'">'.$row_dir[1].'</a>';
	}
?>
			</select><br><br>
                        Fecha Check-in:<br>
			<input type="text" name="desde" placeholder="YYYY-MM-DD">
			<br><br>
			            Fecha Check-out:<br>
			<input type="text" name="hasta" placeholder="YYYY-MM-DD">
			<br><br>
			<input type="hidden" name="user" value="<?php echo $_SESSION['user']; ?>">
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