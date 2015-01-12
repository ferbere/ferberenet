<?php
session_start();
include("library/confirm.php");
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
			<form method="post" action="gadgets/agenda/ip_evento_a.php">
	<div id="maincontent-tit">
		Modificar evento de la Agenda<br><br>
	</div>
		<div id="maincontent-body">
			<div id="a" style="margin-left:30px;">
<?php
	$sql=mysql_query("SELECT id,titulo,subtitulo,categoria,imparte,dirigido,descripcion,lugar,dia,hora_i,hora_t FROM agenda_programa WHERE id = '$rubro' ",$link);
	$sql_imparte=mysql_query("SELECT id,nombre FROM agenda_imparte",$link);
	while($row=mysql_fetch_array($sql)){
		$id=$row[0];
		$titulo=$row[1];
		$subtitulo=$row[2];
		$categoria=$row[3];
		$imparte=$row[4];
		$dirigido=$row[5];
		$descripcion=$row[6];
		$lugar=$row[7];
		$dia=$row[8];
		$hora_i=$row[9];
		$hora_t=$row[10];
	}
?>
		Título:<br>
		<textarea name="titulo" style="width:80%"><?php echo $titulo ?></textarea><br>
		Subtítulo:<br>
		<input type="text" name="subtitulo" value="<?php echo $subtitulo ?>" style="width:80%">
			</div>
			<div id="b">
				<div id="b1">
		Imparte:<br>
		<select name="imparte">
<?php
	while($row_imparte=mysql_fetch_array($sql_imparte)){
		if($imparte!=$row_imparte['id']){
			$hig= 'nain';
		}else{
			$hig="selected";
		}
	echo '<option value="'.$row_imparte[0].'"'.$hig.'>'.$row_imparte[1].'</option>';
	}
?>
		</select>
				</div>
				<div id="b2">
		Dirigido a:<br>
		<select name="dirigido">
		<option value="0" <?php if ($dirigido == "0"){ echo "selected"; } ?>>Indeterminado</a>
		</select>
				</div>
				<div id="b3">
		Categoría:<br>
		<select name="categoria">
		<option value="0" <?php if ($categoria == "0"){ echo "selected"; } ?>>Conferencia</a>
		<option value="1" <?php if ($categoria == "1"){ echo "selected"; } ?>>Logístico</a>
		<option value="2" <?php if ($categoria == "2"){ echo "selected"; } ?>>Act. académica</a>
			</select>
				</div>
			</div>
			<div id="c">
				<div id="c1">
		Descripción:<br>
		<textarea name="descripcion"><?php echo $metatags; ?></textarea>
				</div>
				<div id="c2">
		Lugar:<br>
		<select name="lugar">
		<option value="0" <?php if ($lugar == "0"){ echo "selected"; } ?>>Indeterminado</a>
		</select>
				</div>
			</div>
			<div id="d">
				<div id="d1">
		<select name="dia">
			<option value="0">No programado</a>
<?php
		$sql_dia=mysql_query("SELECT id,fecha FROM agenda_dia", $link);
		while($row_dia=mysql_fetch_array($sql_dia)){
			if($dia==$row_dia[0]){
				$hid='selected';
			}else{
				$hid='none';
			}
			echo '<option value="'.$row_dia[0].'" '.$hid.'>'.$row_dia[1].'</a>';
		}
?>
		</select>
				</div>
				<div id="d2">
		Hora inicio:<br>
		<input type="text" name="hora_i" style="width:35%" value="<? echo $hora_i ?>" />
				</div>
				<div id="d2">
		Hora término:<br>
		<input type="text" name="hora_t" style="width:35%" value="<? echo $hora_t ?>" />
				</div>
			</div>
			<div id="e">
				<div id="e1">
		<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
		<input type="submit"  value="enviar"><br><br>
				</div>
			</div>
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
