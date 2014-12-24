<?php
session_start();
if($_SESSION["privilegioss"]=="ferbere"){
	$link=Conectarse();
	include("library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
	$sql=mysql_query("SELECT id,nombre FROM codigo_categoria",$link);
?>
		<div id="form-main">
		<form method="post" action="gadgets/codigo/ip_codigo.php" name="fvalida">
			<div id="maincontent-tit">
				Agregar código 
			</div>
				<div id="maincontent-body">
					<div>
						Nombre:<br>
				<input type="text" name="nombre" size="80%"><br><br>
						Lenguaje:
				<select name="categoria">
<?php
			while ($row=mysql_fetch_array($sql)){
				echo '<option value="'.$row['id'].'">'."\n".$row['nombre']."</a>   ";
			}
?>
				</select><br><br>
						Contenido:<br>
				<textarea name="contenido" rows=19 cols=80 width:300px height:40px></textarea><br>
				</div>
						<div>
							<input type="submit" value="guardar">
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
