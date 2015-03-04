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
		$sql=mysql_query("SELECT id,user,nombre,imagen,nombramiento,maill,telefono,celular,domicilio,poblacion,colaborador,privilegios,cp,pais,rfc FROM usuario_index WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
			$id=$row[0];
			$user=$row[1];
			$nombre=$row[2];
			$imagen=$row[3];
			$nombramiento=$row[4];
			$maill=$row[5];
			$telefono=$row[6];
			$celular=$row[7];
			$domicilio=$row[8];
			$poblacion=$row[9];
			$colaborador=$row[10];
			$privilegios=$row[11];
			$cp=$row[12];
			$pais=$row[13];
			$rfc=$row[14];
		}
?>
		<form method="post" action="gadgets/usuario/ip_autor_a.php">
		<h1>Editar usuario</h1>
		<label>Usuario:</label>
		<input type="text" name="user" value="<?php echo $user; ?>">
		<label>Nombre completo:</label>
		<input type="text" name="nombre" value="<?php echo $nombre; ?>">
		<label>domicilio:</label>
		<input type="text" name="domicilio" value="<?php echo $domicilio; ?>">
		<label>Población:</label>
		<input type="text" name="poblacion" value="<?php echo $poblacion; ?>">
		<label>e-mail:</label>
		<input type="text" name="maill" value="<?php echo $maill; ?>">
		<label>Teléfono:</label>
		<input type="text" name="telefono" size="15" value="<?php echo $telefono; ?>">
		<label>Teléfono celular:</label>
		<input type="text" name="celular" size="15" value="<?php echo $celular; ?>">
	<?php
		if($_SESSION['privilegioss_id']<=2){
			?>
			<label>Privilegios:</label>
			<select name="privilegios">
			<?php
			$sql3=mysql_query("SELECT id,nombre FROM usuario_privilegios" ,$link);
			while ($row3=mysql_fetch_array($sql3)){
				if($privilegios==$row3['id']){
					$hig_p='selected';
				}else{
					$hig_p='nain';
				}
			echo '<option value="'.$row3['id'].'"'.$hig_p.'>'."\n".$row3['nombre']."</a>   ";
			}
			?>
			</select>
	<?php	}else{?>

		<input type="hidden" name="privilegios" value="<?php echo $_SESSION['privilegioss_id'] ?>">
<?php	}	?>
		<input type="hidden" name="rubro" value="<?php echo $id ?>">
		<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
		</form>
		<div style="margin:0px auto;">
			<hr class="line">
			<div style="margin:0px auto;width:40%">
				<h2>Ajustes avanzados</h2>
				<a href="javascript:ventanaSecundaria('gadgets/usuario/changelog.php?rubro=<?php echo $id ?>')">
					<div class="changelog">
						cambiar contraseña
					</div>
				</a> 
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