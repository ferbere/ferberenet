<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	$link=Conectarse();
	include("../library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
	if(empty($capturado)){
		$sql=mysql_query("SELECT * FROM mails_massive_directorio WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
			$nombre=$row['nombre'];
			$email=$row['email'];
			$grupo=$row['grupo'];
			$telefono_celular=$row['telefono_celular'];
			$telefono_particular=$row['telefono_particular'];
			$telefono_trabajo=$row['telefono_trabajo'];
			$invitacion=$row['invitacion'];
			$confirmacion=$row['confirmacion'];
		}
?>
		<div id="form-main">
		<form method="post" action="gadgets/mensajes/ip_massive_directorio_a.php">
			<div id="maincontent-tit">
				Modificar Contacto
			</div>
				<div id="maincontent-body">
					<div>
						Nombre:<br>
						<input type="text" name="nombre" size="30" value="<?php echo $nombre ?>"><br>
						e-mail:<br>
						<input type="text" name="email" value="<?php echo $email ?>" size="30"><br>
						Grupo:<br>
					<select name="grupo">
<?php
	$sqlCat=mysql_query("SELECT id,nombre FROM mails_massive_grupo ORDER BY id ASC ",$link);
	$sqlCat2=mysql_query("SELECT MAX(id) as max FROM mails_massive_grupo ",$link);
	$rowCat2=mysql_fetch_array($sqlCat2);
	while($rowCat=mysql_fetch_array($sqlCat)){
		if($grupo!=$rowCat['id']){
			$hig= 'nain';
		}else{
			$hig="selected";
		}
			echo '<option value="'.$rowCat['id'].'"'.$hig.'>'.$rowCat['nombre'].'</option>';
	}
		?>
					</select><br><br>
					Teléfono celular:<br>
					<input type="text" name="telefono_celular" value="<?php echo $telefono_celular ?>" size="30"><br>
					Teléfono particular:<br>
				<input type="text" name="telefono_particular" value="<?php echo $telefono_particular ?>" size="30"><br>
					Teléfono trabajo:<br>
			<input type="text" name="telefono_trabajo" value="<?php echo $telefono_trabajo ?>" size="30"><br>
					Invitación:<br>
			<select name="invitacion">
<?php
$sqlInvi=mysql_query("SELECT id,nombre FROM mails_massive_directorio_invi ORDER BY id ASC ",$link);
$sqlInvi2=mysql_query("SELECT MAX(id) as max FROM mails_massive_directorio_invi ",$link);
$rowInvi2=mysql_fetch_array($sqlInvi2);
while($rowInvi=mysql_fetch_array($sqlInvi)){
if($invitacion!=$rowInvi['id']){
	$higI= 'nain';
}else{
	$higI="selected";
}
	echo '<option value="'.$rowInvi['id'].'"'.$higI.'>'.$rowInvi['nombre'].'</option>';
}
?>
			</select><br><br>
								Confirmación:<br>
						<select name="confirmacion">
			<?php
			$sqlConf=mysql_query("SELECT id,nombre FROM mails_massive_confirmacion ORDER BY id ASC ",$link);
			$sqlConf2=mysql_query("SELECT MAX(id) as max FROM mails_massive_confirmacion ",$link);
			$rowConf2=mysql_fetch_array($sqlConf2);
			while($rowConf=mysql_fetch_array($sqlConf)){
			if($confirmacion!=$rowConf['id']){
				$higC= 'nain';
			}else{
				$higC="selected";
			}
				echo '<option value="'.$rowConf['id'].'"'.$higC.'>'.$rowConf['nombre'].'</option>';
			}
			?>
						</select><br><br>

					</div>
						<div>
							<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
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