<?php
session_start();

if(isset($_SESSION['carro'])){
	$carro=$_SESSION['carro'];	
}else{
	$carro=false;
}
if($_GET[$row2['id']]){
	$id=$_GET[$row2['id']];
}
//echo '<a href="agregacar.php?'. SID.'&id='.$row2['id'].'">comprar</a>';

?>
<form method="GET" action="comprar.php">
	<input type="hidden" name="ruta" value="agregacar.php">
	<input type="number" name="cantidad">
	<input type="hidden" name="id" value="<?php echo $row2['id'] ?>">
	<input type="submit" value="comprar">
</form>