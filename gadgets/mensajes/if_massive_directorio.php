<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	$link=Conectarse();
	include("../library/confirm.php");
	if(isset($_GET['capturado'])){
		$capturado=$_GET['capturado'];
	}
	if(empty($capturado)){
?>
		<div id="form-main">
		<form method="post" action="gadgets/mensajes/ip_massive_directorio.php">
			<div id="maincontent-tit">
				Crea contacto de correo
			</div>
				<div id="maincontent-body">
					<div>
						Nombre:<br>
						<input type="text" name="nombre" size="30" placeholder="Nombre del contacto"><br>
						email:<br>
						<input type="email" name="email" placeholder="e-mail" size="30"><br>
						Teléfono celular:<br>
						<input type="text" name="telefono_celular" placeholder="inserte número" size="30"><br>
						Teléfono particular:<br>
						<input type="text" name="telefono_particular" placeholder="inserte número" size="30"><br>
						Teléfono trabajo:<br>
						<input type="text" name="telefono_trabajo" placeholder="inserte número" size="30"><br>
						Grupo:<br>
						<select name="grupo">
			<?php
				$sqlCat=mysql_query("SELECT id,nombre FROM mails_massive_grupo ORDER BY id ASC ",$link);
				while($rowCat=mysql_fetch_array($sqlCat)){
					echo '<option value="'.$rowCat['id'].'">'.$rowCat['nombre'].'</option>';
					}
			?>
						</select><br><br>
					</div>
						<div>
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