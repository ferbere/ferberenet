<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	include_once("classes/mysql.php");
	$mysql = new MySQL();
	extract($_SESSION);	
	$sql = $mysql->consulta("SELECT * FROM gadgets_index WHERE privilegios >= ".$privilegioss_id);
?>	
		<table>
			<tr>
				<td>
<?php
	while ($row = $mysql->fetch_array($sql)){
		echo '<a href="'.$row['gadget'].'.php?ruta='.$row['ruta'].'"><img src="images/'.$row['gadget'].'.jpg" class="rollover"></a>';
	}
?>
				</td>
			</tr>
		</table>
<?php
}else{
	if(isset($_POST['capturado'])){
		$capturado=$_POST['capturado'];
	}
	if(isset($_GET['adios'])){
		$adios=$_GET['adios'];
	}
	if(empty($capturado)){
		include("login.php");
	}else{
		include("ses.php");
	}
	echo $capturado;
}

?>