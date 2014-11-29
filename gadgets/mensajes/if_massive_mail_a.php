<?php 
session_start();
if($_SESSION["estado"]=="Autenticado"){
	$link=Conectarse();
	include("../library/confirm.php");
	include("../library/tinymce.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
		$sql=mysql_query("SELECT * FROM mails_massive_mensajes WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
			$id=$row['id'];
			$titulo=$row['titulo'];
			$mensaje=$row['mensaje'];
			$grupo=$row['grupo'];
		}
?>
<div id="form-main">
	<div id="maincontent-tit">
		Redactar correo masivo<br><br>
	</div>
		<div id="maincontent-body">
			<form method="post" action="gadgets/mensajes/ip_massive_mail_a.php">
			<input type="text" name="titulo" value="<?php echo $titulo ?>" style="width:100%"><br><br>
			<textarea name="mensaje"  style="width:100% " rows="7"><?php echo $mensaje ?></textarea><br>
		<div>
<?php
if(empty($capturado)){
}
?>
			Grupo:<br>
			<select name="grupo">
<?php
	$sqlCat=mysql_query("SELECT id,nombre FROM mails_massive_grupo ORDER BY id ASC ",$link);
	$sqlCat2=mysql_query("SELECT MAX(id) as max FROM mails_massive_grupo ",$link);
	$rowCat2=mysql_fetch_array($sqlCat2);
	while($rowCat=mysql_fetch_array($sqlCat)){
		if($grupo!=$rowCat['id']){
			$hig= 'nain';
		}else{$hig="selected";}
			echo '<option value="'.$rowCat['id'].'"'.$hig.'>'.$rowCat['nombre'].'</option>';
		}
?>
			</select><br><br>
		</div>
			<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
			<input type="submit" value="Guardar">
		</div>
<?php
}else{
	echo "Usted no tiene acceso a esta seccción";
}
?>