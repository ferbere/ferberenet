<tr><td>
	<table style="width:100%">
<?php
if(isset($_GET['cantidad'])){
$cantidad=$_GET['cantidad'];
}
if(empty($cantidad)){
$cantidad = 1;
}
while($row = mysql_fetch_array($rs)){
	$sql2b = $sql2." and catalogo_dimensiones.vincula = ".$row[0];
	$rs2 = mysql_query($sql2b);
	?>
		<tr>
			<td>
				<table id="catalogo_consulta1">
					<tr>
						<td id="catalogo_consulta1-1" colspan="2">
							<strong>
<?php		echo $row[0].'.-'.$row[1]; ?>
							</strong>
						</td>
					</tr>
						<tr>
							<td id="catalogo_consulta2-1" style="width:40%">
			<a href="javascript:ventanaSecundaria('comprar/comprara_ind.php?rubro=<?php echo $row[0] ?>')">
			<img src="images/catalogo/<?php echo $row[3]?>.jpg">
			</a>
							</td>
								<td id="catalogo_consulta2-2">
<?php
		while($row2 = mysql_fetch_array($rs2)){
			echo $row2['nombre'].', precio: $'.$row2['precio'].'<br>';
			?>
				<form method="GET" action="comprar.php">
				<input type="hidden" name="ruta" value="agregacar.php">
				<input type="number" name="cantidad" value="<?php echo $cantidad ?>">
				<input type="hidden" name="id" value="<?php echo SID.$row['id'] ?>">
				<input type="hidden" name="dimensiones" value="<?php echo $row2['nombre'] ?>">
				<input type="hidden" name="rubro" value="<?php echo $row['id'] ?>">
				<input type="submit" value="comprar">
				</form>
			<?php
			echo '<div class="hr"><hr/></div>';
		}
		if($row['precio']>0.00){
			echo 'precio: $'.$row['precio'];
			echo '<div class="hr"><hr/></div>';
			
		}
?>
								</td>
						</tr>
				</table><br>
			</td>
		</tr>
<?php
}
?>
	</table>
</td></tr>
<script language=javascript> 
function ventanaSecundaria (URL){ 
   window.open(URL,"ventana1","width=500,height=600,scrollbars=NO",titlebar="yes") 
} 
</script>