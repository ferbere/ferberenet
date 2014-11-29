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
		$sql=mysql_query("SELECT * FROM comprar_directorio WHERE id = '$rubro' ",$link);
		while($row=mysql_fetch_array($sql)){
			$user=$row['user'];
			$name=$row['name'];
			$address=$row['address'];
			$city=$row['city'];
			$state=$row['state'];
			$country=$row['country'];
			$zip=$row['zip'];
			$mail=$row['mail'];
			$phone=$row['phone'];
			$createtime=$row['createtime'];
			$activated=$row['activated'];
		}
?>
		<div id="form-main">
		<form method="post" action="gadgets/comprar/ip_directorio_a.php">
			<div id="maincontent-tit">
				Directorio de pesonas registradas
			</div>
				<div id="maincontent-body">
					<div>
						Usuario:<br>
						<input type="text" name="user" size="30" value="<?php echo $user ?>"><br>
						Nombre:<br>
						<input type="text" name="name" value="<?php echo $name ?>" size="30"><br>
						Dirección:<br>
						<input type="text" name="address" value="<?php echo $address ?>" size="30"><br>
						Ciudad:<br>
						<input type="text" name="city" value="<?php echo $city ?>" size="30"><br>
						Estado:<br>
						<input type="text" name="state" value="<?php echo $state ?>" size="30"><br>
						País:<br>
						<input type="text" name="country" value="<?php echo $country ?>" size="30"><br>
						Código Postal:<br>
						<input type="text" name="zip" value="<?php echo $zip ?>" size="30"><br>
						Correo-e:<br>
						<input type="text" name="mail" value="<?php echo $mail ?>" size="30"><br>
						Teléfono:<br>
						<input type="text" name="phone" value="<?php echo $phone ?>" size="30"><br>
						Fecha de alta:<br>
						<input type="text" name="createtime" value="<?php echo $createtime ?>" size="30"><br>
<?php
if($activated==1){
	$visi_no='nain';
	$visi_si='checked';
}elseif($activated==0){
	$visi_no='checked';
	$visi_si='nain';

}
?>
						Cuenta activada:<br>
			<input type="radio" name="activated" value="0" <?php echo $visi_no ?>>No
			<input type="radio" name="activated" value="1" <?php echo $visi_si ?>>Sí<br>


					</div>
						<div>
							<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
							<input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
							</form>
						</div>
		</div>
<?php
	}elseif($capturado==1){
		echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
	}elseif($capturado==2){
		echo "Usted no tiene acceso a esta seccción";
	}
}else{
	echo "Usted no tiene acceso a esta seccción";
}
?>