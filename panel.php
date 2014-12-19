<?php
session_start();
if($_SESSION["estado"]=="Autenticado"){
	include_once("classes/mysql.php");
	$mysql = new MySQL();
	extract($_SESSION);	
	$sql = $mysql->consulta("SELECT id,gadget,alias,ruta FROM gadgets_index WHERE visible = 1 AND privilegios >= ".$privilegioss_id);
?>	
		
<?php
	while ($row = $mysql->fetch_array($sql)){
		echo '<div class="alba">';
		echo 	'<a href="'.$row[1].'.php?ruta='.$row[3].'">';
		echo 		'<img src="images/'.$row[1].'.png"><br>';
		echo 		'<span>'.$row[2].'</span>';
		echo 	'</a>';
		echo '</div>';
	}
?>

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