<?php
session_start();
if($_SESSION['privilegioss']=="ferbere"){
?>
<div style="margin:0px auto;text-align:center; width:50%">
<div>
<h2>Día</h2>
</div>
<div style="text-align:left; width:50%">
<ul>
<?php
	$sql_dia=mysql_query("SELECT * FROM congreso_dia ",$link);
	while($row_dia=mysql_fetch_array($sql_dia)){
		echo '<li><a href="congreso.php?ruta=if_coordina.php&rubro='.$row_dia['id'].'">'.$row_dia['nombre'].'</a><br></li>';
	}
?>
</ul>
</div>
</div>
<?
}else{
	echo "Usted no tiene acceso a esta sección";
}
?>
