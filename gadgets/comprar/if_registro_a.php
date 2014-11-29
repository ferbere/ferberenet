<?php
session_start();
if(($_SESSION['privilegioss']=='ferbere')||($_SESSION['privilegioss']=='admin')){
	include_once("../classes/mysql.php");
	include_once("../classes/restaFechas.class.php");

	$mysql = new MySQL();
	if(isset($_GET['capturado'])){
		$capturado = $_GET['capturado'];
	}
	if(empty($capturado)){	
		if(isset($_GET['rubro'])){
			$rubro = $_GET['rubro'];
		}
			$sql = $mysql -> consulta("SELECT comprar_index.id,comprar_index.user,catalogo_index.nombre,comprar_index.desde,comprar_index.hasta,comprar_index.precio,comprar_index.suma,comprar_index.fecha,comprar_directorio.name FROM comprar_index INNER JOIN catalogo_index ON comprar_index.catalogo = catalogo_index.id INNER JOIN comprar_directorio ON comprar_index.cliente = comprar_directorio.id WHERE comprar_index.id = '$rubro' ORDER BY comprar_index.id DESC ");
			$cuenta = $mysql->num_rows($sql);
			while($row = $mysql -> fetch_array($sql)){
				$id			=	$row[0];
				$user		=	$row[1];
				$catalogo	=	$row[2];
				$desde		= $row[3];
				$hasta		= $row[4];
				$precio		= $row[5];
				$suma		= $row[6];
				$fecha		= $row[7];
				$dias		= diferenciaEntreFechas( $desde, $hasta, "DIAS", FALSE);
				$cliente	= $row[8];
			}
			$total=$precio*$dias;
			echo	"<strong>Este movimiento fue registrado por el usuario <big>".$user.'</big></strong>.<br><br>';
			echo '<table style="width:100%; border:1px dotted">';
			echo 	'<tr>';
		//	echo 		'<td style="border:1px dotted" colspan="4">
		//					Operación: '.$row['id']."\n";
			echo 'Realizado el día '.$fecha.'  ';
			if($cliente!='ninguno'){
			echo ' a nombre de: <strong>'.$cliente.'</strong>';
			}
			echo 		'</td>';
			echo 	'</tr>';
			echo 	'<tr>';
			echo '<td style="width:20%;border:1px dotted">Villa: </td>';
			echo '<td style="width:10%;border:1px dotted; text-align:center">Desde</td>';
			echo '<td style="width:10%;border:1px dotted; text-align:center">Hasta</td>';
			echo '<td style="width:10%;border:1px dotted; text-align:center">Días</td>';
			echo '<td style="width:30%;border:1px dotted; text-align:center">Precio unitario:</td>';
			echo '<td style="width:30%;border:1px dotted; text-align:center">Cantidad: </td>';
			echo '</tr>';

			echo 	'<tr>';
			echo '<form method="post" action="gadgets/comprar/ip_registro_a.php">';
			echo '<input type="hidden" name="rubro" value="'.$rubro.'">';
			echo '<td style="width:20%;border:1px dotted">';?>
					<select name="catalogo">
					<?php
						$sql_cat=$mysql->consulta("SELECT id,nombre FROM catalogo_index");
						while($row_cat=$mysql->fetch_array($sql_cat)){
							if($catalogo!=$row_cat[1]){
								$sel_cat = 'none';
							}else{
								$sel_cat = 'selected';
							}
							echo '<option value="'.$row_cat[0].'"'.$sel_cat.'>'.$row_cat[1].'</option>';	
						}?>
					</select>
					</td>
			<?php
			echo '<td style="width:10%;border:1px dotted; text-align:center">';
			echo '<input type="date" name="desde" value="'.$desde.'">';
			echo '</td>';
			echo '<td style="width:10%;border:1px dotted; text-align:center">';
			echo '<input type="date" name="hasta" value="'.$hasta.'">';
			echo '</td>';
			echo '<td style="width:10%;border:1px dotted; text-align:center">'.$dias.'</td>';
			echo '<td style="width:30%;border:1px dotted; text-align:center">';
			echo 'us$<input type="decimal" step="any" min="0" name="precio" value="'.$precio.'">';
			echo '<input type="hidden" step="any" min="0" name="suma" value="'.$total.'">';
			echo '</td>';
			echo '<td style="width:30%;border:1px dotted; text-align:right">us$'.number_format($total,2).'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td colspan="4">';
			echo '<input type="submit" value="enviar">';
			echo '</td>';
			echo '<td colspan="4">';
			echo '<a href="'.$_SERVER['PHP_SELF'].'?ruta=borra.php&borra=1&rubro='.$rubro.'">Borrar</a>';
			echo '</td>';
			echo '</tr>';
			echo '</table>';
	}elseif($capturado==1){
		echo 'Muy bien, el contenido ha sido capturado';
	}else{
		echo 'Pos algo pasó en la base de datos, que no se capturó';
	}
}else{
	echo "No tienes privilegios para ingresar en esta sección";
}
?>