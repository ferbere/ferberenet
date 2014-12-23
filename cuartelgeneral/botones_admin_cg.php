<?php
session_start();
extract($_SESSION);
include_once("../classes/sacar.class.php");
$link = Conectarse();  
if(isset($_GET['ruta'])){
	$ruta=$_GET['ruta'];
}
if(empty($ruta)){
	$gadget=0;
}
$priv=$privilegioss_id-1;
$gad=sacar($_SERVER['PHP_SELF'],"ferberenet/",".php");
		$sql=mysql_query("SELECT * FROM gadgets_index INNER JOIN gadgets_botones_admin ON gadgets_botones_admin.gadget = gadgets_index.id WHERE gadgets_botones_admin.privilegios > '$priv'  AND gadgets_botones_admin.imagen != 'none' AND gadgets_index.gadget = '$gad' AND gadgets_botones_admin.visible = 1; ",$link);
?>
		<table border="0">
			<tr>
<?php
		while ($row=mysql_fetch_array($sql)){
			$send=$gad.'.php?ruta='.$row['ruta'];
			echo '<td valign="center">';
			echo 	'<a href="'.$send.'">';
//			echo 		'<img src="images/'.$row['imagen'].'.'.$row['ext'].'" class="rollover" width="16px">';
			echo 		'<div id="btn_source" class="'.$row['imagen'].'"> ';
			echo 			$row['boton'];
			echo 		'</div>';
			echo 	'</a>';
			echo '</td>';	
			echo '<td>';
			echo '</td>';
}
?>
			</tr>
		</table>
