<?php 
include("../library/tinymce.php");
include("../library/confirm.php");

if(isset($_GET['capturado'])){
$capturado=$_GET['capturado'];
}
if(empty($capturado)){
?>
<div id="form-main">
	<div id="maincontent-tit">
		Redactar correo masivo<br><br>
	</div>
		<div id="maincontent-body">
			<form method="post" action="gadgets/mensajes/ip_massive_mail.php">
			<input type="text" name="titulo" placeholder="Título" style="width:100%"><br><br>
			<textarea name="mensaje"  style="width:100% " rows="7"  placeholder="El mensaje"></textarea><br>
					<div>
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
			<input type="submit" value="Guardar">
		</div>
<?php
}else{
	echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
}
?>