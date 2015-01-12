<?php
session_start();
if($_SESSION["privilegioss"]=="ferbere"){
	$link=Conectarse();
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
		include_once("classes/mysql.php");
		$mysql=new MySQL();
		$sql=$mysql->consulta("SELECT user FROM usuario_index ORDER BY id DESC");
		$cuenta=$mysql->num_rows($sql);
?>
		<div id="form-main">
		<form method="post" action="gadgets/parallax/ip_parallax.php" name="fvalida">
			<div id="maincontent-tit">
				Agregar sitio
			</div>
				<div id="maincontent-body">
					<div>
						<input type="hidden" name="cuenta" value="<?php echo $cuenta ?>">
						Nombre:<br>
				<input type="text" name="nombre" size="80%"><br><br>
						Ruta:<br>
				<input type="text" name="ruta" size="80%"><br><br>
					Usuarios:<br>
<?php
$i=1;
while($row=mysql_fetch_array($sql)){
	echo '<input type="checkbox" name="user[]" value="'.$i.'">'.$row[0].'  ';
	$i=$i+1;
}?><br><br>
						visible:<br>
				Sí <input type="radio" name="visible" value="1" size="30">
				No <input type="radio" name="visible" value="0" size="30">
						
				</div>
						<div>
							<input type="submit" value="enviar">
					</form>
						</div>
				</div>
<?php
}else{
	echo "El contenido ha sido capturado, debidamente. ?Muy bien!";
}
}else{
echo "Usted no tiene acceso a esta seccci?n";
}
?>
