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
?>
<div id="form-main">
			<form method="post" action="gadgets/congreso/ip_evento_a.php">
	<div id="maincontent-tit">
		Modificar evento del Congreso<br><br>
	</div>
		<div id="maincontent-body">
			<div>
<?php
	$sql=mysql_query("SELECT * FROM programa WHERE id = '$rubro' ",$link);
	$sql_imparte=mysql_query("SELECT id,imparte FROM imparte",$link);
	while($row=mysql_fetch_array($sql)){
		$tema=$row['tema'];
		$subtema=$row['subtema'];
		$imparte=$row['imparte'];
		$dirigido=$row['dirigido'];
		$tipo=$row['tipo'];
		$lugar=$row['lugar'];
		$fecha=$row['dia'];
		$hora_i=$row['hora_i'];
		$hora_t=$row['hora_t'];

	}
?>
		Tema:<br>
		<textarea name="tema" rows=10 cols=70 width:300px height:40px><?php echo $tema ?></textarea><br>
		Subtema:<br>
		<input type="text" name="subtema" style="width:400px" value="<?php echo $subtitulo ?>"><br>
		Imparte:<br>
		<select name="imparte">
<?php
	while($row_imparte=mysql_fetch_array($sql_imparte)){
		if($imparte!=$row_imparte['id']){
			$hig= 'nain';
		}else{
			$hig="selected";
		}
	echo '<option value="'.$row_imparte['id'].'"'.$hig.'>'.$row_imparte['imparte'].'</option>';
	}
?>
		</select><br><br>
		Dirigido a:<br>
		<select name="dirigido">
		<option value="0" <?php if ($dirigido == "0"){ echo "selected"; } ?>>Indeterminado</a>
		</select><br><br>
		Tipo:<br>
		<select name="tipo" size="2" style="width:150px">
		<option value="0" <?php if ($tipo == "0"){ echo "selected"; } ?>>Conferencia</a>
		<option value="1" <?php if ($tipo == "1"){ echo "selected"; } ?>>Logístico</a>
		<option value="2" <?php if ($tipo == "2"){ echo "selected"; } ?>>Act. académica</a>
			</select><br><br>
		Descripción:<br>
		<textarea name="descripcion" rows=19 cols=70 width:300px height:40px><?php echo $metatags; ?></textarea><br><br>
		Lugar:<br>
		<select name="lugar" size="5" style="width:150px">
		<option value="0" <?php if ($lugar == "0"){ echo "selected"; } ?>>Indeterminado</a>
		</select><br><br>
		Día:<br>
		<input type="text" name="dia" style="width:35%" value="<?php echo $fecha ?>" /><br><br>
		Hora inicio:<br>
		<input type="text" name="hora_i" style="width:35%" value="<? echo $hora_i ?>" /><br><br>
		Hora término:<br>
		<input type="text" name="hora_t" style="width:35%" value="<? echo $hora_t ?>" /><br><br>
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
?>
