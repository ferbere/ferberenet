<!DOCTYPE html>
<html>
<head>
	<title>Prueba</title>
	<link rel="stylesheet" type="text/css" href="test.css" />
	<title>test</title>
</head>
<body>
	<?php
if(isset($_POST['rubro'])){
		$rubro=$_POST['rubro'];
}
	if(isset($_GET['rubro'])){
		$rubro=$_GET['rubro'];
		echo file_get_contents("http://localhost/revista/test/index.php?rubro=".$rubro);
	}else{
		echo file_get_contents("http://localhost/revista/test/index.php");
	}
?>
</body>
</html>