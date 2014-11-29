<?php
session_start();
if($_SESSION['estado']=="Autenticado"){
if(isset($_GET["rubro"])){
$rubro=$_GET["rubro"];
}
if(isset($_POST["rubro"])){
$rubro=$_POST["rubro"];
}

if(isset($_POST["changelog"])){
$changelog=$_POST["changelog"];
}

include_once('../../classes/conex.php');
$link=Conectarse();
	if($_SESSION['privilegioss_id']>1){
		if($rubro!=$_SESSION['id']){
			$rubro=$_SESSION['id'];
		}
	}
?>
	<title>Cambiar contraseña</title>
	<script>
	function cerrarse(){
	window.close() }
	</script>

	<?php

	echo '<body bgcolor="#EEF0F7">';
	echo '<div align="center" valign="center">';
	if(empty($changelog)){
	?>
		<form action="changelog.php" method="post">
		Escriba su nueva contraseña<br><input type="password" name="passwd"><br><br>
		Repita su nueva contraseña<br><input type="password" name="passwd_2"><br><br>
		<input type="hidden" name="changelog" value="1">
		<input type="hidden" name="rubro" value="<?php echo $rubro ?>">
		<input type="submit" value="cambiar">
		</form>
	<?php
	}else{
		if(isset($_POST['passwd'])){
			$passwd=md5(addslashes(trim($_POST['passwd'])));
		}
		if(isset($_POST['passwd_2'])){
			$passwd_2=md5(addslashes(trim($_POST['passwd_2'])));
		}
		if($passwd==$passwd_2){
			echo 'Ha cambiado su contraseña exitosamente';
		$sql=mysql_query("UPDATE usuario_index SET passwd = '$passwd' WHERE id = '$rubro' ",$link);
			if(!$sql){
				die ("chispas:" .mysql_error());
			}
		}else{
			echo "Las contraseñas no coinciden. Intente de nuevo";
		}
	}
	echo '<br><br><form> <input type=image value="Cerrar" src="images/cruz.jpg" onclick="cerrarse()"> </form> ';
	echo '</div></body>';
}else{
	echo "Usted no tiene acceso a esta sección";
}
?>