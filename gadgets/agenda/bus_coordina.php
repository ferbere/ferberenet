<?php
session_start();
if(($_SESSION['privilegioss']=="ferbere")||($_SESSION['privilegioss']=="admin")){
?>
<div style="margin:0px auto;text-align:center; width:50%">
	<div>
	<h2>Día</h2>
	</div>
	<div style="text-align:left; width:50%">
		<ul>
		<?php
			$sql_dia=mysql_query("SELECT id,fecha FROM agenda_dia ",$link);
			while($row_dia=mysql_fetch_array($sql_dia)){
				echo '<li>';
				echo 	'<a href="agenda.php?ruta=if_coordina.php&rubro='.$row_dia[0].'">';
				echo 		$row_dia[1];
				echo 	'</a><br>';
				echo '</li>';
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
