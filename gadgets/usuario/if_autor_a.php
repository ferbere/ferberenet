<?php
session_start();
if(isset($_GET['rubro'])){
	$rubro=$_GET['rubro'];
}
if($_SESSION["estado"]=="Autenticado"){
	/* Medida antihackeo->Evita que el usuario logueado cambie el $rubro para modificar la cuenta de otro usuario */
	if($_SESSION['privilegioss_id']>2){
		if($rubro!=$_SESSION['id']){
			$rubro=$_SESSION['id'];
		}
	}
	$link=Conectarse();
	include("library/tinymce.php");
	include("library/confirm.php");
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
	$sql=mysql_query("SELECT * FROM usuario_index WHERE id = '$rubro' ",$link);
	while($row=mysql_fetch_array($sql)){
?>
	<div id="form-main">
		<form method="post" action="gadgets/usuario/ip_autor_a.php">
		<div id="maincontent-tit">
			Editar usuario<br><br>
		</div>
			<div id="maincontent-body">
				Usuario:<br>
				<input type="text" name="user" value="<?php echo $row['user']; ?>"><br><br>
				Nombre completo:<br>
				<input type="text" name="nombre" size="100" value="<?php echo $row['nombre']; ?>"><br><br>
				domicilio:<br>
				<input type="text" name="domicilio" size="100" value="<?php echo $row['domicilio']; ?>"><br><br>
				Población:<br>
				<input type="text" name="poblacion" size="100" value="<?php echo $row['poblacion']; ?>"><br><br>
			<div>
				<div>
					<div style="float: left">
						e-mail:<br>
			<input type="text" name="maill" size="25" value="<?php echo $row['maill']; ?>"><br>
					</div>
						<div style="float: left; position: relative; left: 50px">
							Teléfono:<br>
			<input type="text" name="telefono" size="15" value="<?php echo $row['telefono']; ?>"><br><br>
						</div>
							<div style="float: left; position: relative; left: 120px">
								Teléfono celular:<br>
			<input type="text" name="celular" size="15" value="<?php echo $row['celular']; ?>">
							</div>
				</div>
					<div style="clear: both">
	<?php
		if($_SESSION['privilegioss_id']<=2){
			?>
			Privilegios:  <select name="privilegios">
			<?php
			$sql3=mysql_query("SELECT id,nombre FROM usuario_privilegios" ,$link);
			while ($row3=mysql_fetch_array($sql3)){
				if($row['privilegios']==$row3['id']){
					$hig_p='selected';
				}else{
					$hig_p='nain';
				}
			echo '<option value="'.$row3['id'].'"'.$hig_p.'>'."\n".$row3['nombre']."</a>   ";
			}
			?>
			</select>
	<?php	}	?>
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
	}
		}else{
			echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
		}
}else{
echo "Usted no tiene acceso a esta seccción";
}
?>