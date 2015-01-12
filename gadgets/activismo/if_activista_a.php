<?php
session_start();
$link=Conectarse();
if(($_SESSION["privilegioss"]=="ferbere")||($_SESSION["privilegioss"]=="admin")){
	include("library/confirm.php");
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
	}
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
?>
	<script language=javascript> 
	function ventanaSecundaria (URL){ 
	   window.open(URL,"ventana1","width=300,height=300,scrollbars=NO",titlebar="yes") 
	} 
	</script>
<?php
if(empty($capturado)){
	$sql=mysql_query("SELECT id,user,nombre,imagen,rango,email,telefono,celular,domicilio,poblacion,estado,redes,discipulos FROM activismo_index WHERE id = '$rubro' ",$link);
	while($row=mysql_fetch_array($sql)){
		$id 		= $row[0];
		$user 		= $row[1];
		$nombre 	= $row[2];
		$imagen 	= $row[3];
		$rango 	 	= $row[4];
		$email 		= $row[5];
		$telefono  	= $row[6];
		$celular 	= $row[7];
		$domicilio 	= $row[8];
		$poblacion 	= $row[9];
		$estado 	= $row[10];
		$redes 		= $row[11];
		$discipulos	= $row[12];
	}
?>
	<div id="form-main">
		<form method="post" action="gadgets/activismo/ip_activista_a.php">
		<div id="maincontent-tit">
			Editar usuario<br><br>
		</div>
			<div id="maincontent-body">
				<div id="a">
					<div id="a1">
						Usuario:<br>
						<input type="text" name="user" value="<?php echo $user ?>">
					</div>
					<div id="a2">
						Nombre completo:<br>
						<input type="text" name="nombre" size="100%" value="<?php echo $nombre ?>">
					</div>
				</div>
				<div id="b">
					<div id="b1">
						domicilio:<br>
						<input type="text" name="domicilio" size="50" value="<?php echo $domicilio ?>">
					</div>
					<div id="b2">
					Estado:<br>
					<select name="estado">
<?php
$sql_est=mysql_query("SELECT id,nombre FROM geo_estados",$link);
while($row_est=mysql_fetch_array($sql_est)){
	if($estado==$row_est[0]){
		$hig_e='selected';
	}else{
		$hig_e='nain';
	}
	echo '<option value="'.$row_est[0].'"'.$hig_e.'>'."\n".$row_est[1]."</a>";
}
?>
					</select>
					</div>
					<div id="b3">
					Población: <br>
					<select name="poblacion">
<?php
$sql_mun=mysql_query("SELECT id,nombre FROM geo_municipios_jal",$link);
while($row_mun=mysql_fetch_array($sql_mun)){
	if($poblacion==$row_mun[0]){
		$hig_p='selected';
	}else{
		$hig_p='nain';
	}
	echo '<option value="'.$row_mun[0].'"'.$hig_p.'>'."\n".$row_mun[1]."</a>";
}
?>
					</select>
					</div>
				</div>
				<div id="c">
					<div id="c1">
						imagen:<br>
			<input type="text" name="imagen" size="25" value="<?php echo $imagen ?>"><br>
					</div>
					<div id="c2">
					Rango:<br>
					<select name="rango">
<?php
			$sql_ran=mysql_query("SELECT id,nombre FROM activismo_rango" ,$link);
			while ($row_ran=mysql_fetch_array($sql_ran)){
				if($rango==$row_ran['id']){
					$hig_r='selected';
				}else{
					$hig_r='nain';
				}
			echo '<option value="'.$row_ran[0].'"'.$hig_r.'>'."\n".$row_ran[1]."</a>   ";
			}
			?>
			</select>
					</div>
				</div>
				<div id="d">
					<div id="d1">
						e-mail:<br>
			<input type="text" name="email" size="25" value="<?php echo $email; ?>"><br>
					</div>
					<div id="d2">
						Teléfono:<br>
			<input type="text" name="telefono" size="15" value="<?php echo $telefono ?>"><br><br>
					</div>
					<div id="d3">
						Teléfono celular:<br>
			<input type="text" name="celular" size="15" value="<?php echo $celular ?>">
					</div>
				</div>
						<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
						<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
						</form><br><br>
					</div>
				</div>
		</div>
					<div style="width:100%">
						<div align="center"><hr class="line"><br><br>
							<h2>Ajustes avanzados</h2>
						</div>
							<div class="changelog"><br><br>
								<a href="javascript:ventanaSecundaria('gadgets/usuario/changelog.php?rubro=<?php echo $rubro ?>')"> cambiar contraseña</a> 
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