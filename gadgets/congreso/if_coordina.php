<?php
session_start();
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
		$sql_dia=mysql_query("SELECT * FROM congreso_dia WHERE id = '$rubro' ",$link);
		while($row_dia=mysql_fetch_array($sql_dia)){
			$id=$row_dia['id'];
			$nombre=$row_dia['nombre'];
		}
		$sql_coordina=mysql_query("SELECT congreso_coordina.id,imparte.imparte FROM imparte,congreso_coordina WHERE imparte.id=congreso_coordina.coordinador_id AND congreso_coordina.dia_id = '$id'",$link);
		$sql_imparte=mysql_query("SELECT id,imparte FROM imparte",$link);
?>
<div id="form-main">
			<form method="post" action="gadgets/congreso/ip_coordina.php">
	<div id="maincontent-tit">
		¿Quién coordina el <?echo $nombre ?>?<br><br>
	</div>
		<div id="maincontent-body">
			<div style="text-align:center;margin:0px auto"><h2>Coordinadores registrados</h2><br>
			<table style="margin:0px auto; text-align:center">
			<?php
			while($row_c=mysql_fetch_array($sql_coordina)){
				echo '<tr><td style="width:300px; text-align:left; border-bottom:1px dotted">'.$row_c['imparte'].'</td>';
				echo '<td></td>';
				echo '<td style="width:100px"><a href="congreso.php?ruta=borra.php&borra=4&rubro='.$row_c['id'].'">borrar</a></td></tr>';
			}
			?>
			</table>
<br><br>
		Imparte:<br>
		<select name="coordinador_id">
		<option value="0">ninguno</option>
<?php
	while($row_imparte=mysql_fetch_array($sql_imparte)){
		echo '<option value="'.$row_imparte['id'].'">'.$row_imparte['imparte'].'</option>';
	}
?>
	</select><br><br>
		<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
		<input type="hidden" name="dia_id" value="<?php echo $id ?>">
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
?>
