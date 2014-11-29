<?php
session_start();
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;

class paginacion {
	var $regxpag = 25;	// registros por página
	function cuantos($sql,$pez){
		if(isset($_GET['criterio'])){
			$criterio = $_GET['criterio'];
		}else{
			$criterio='';
		}
		$txt_criterio = $criterio;
		$sql.=$pez;
		$rs=mysql_query($sql);
		$hallados=mysql_num_rows($rs);
?>
	<div style="border: 0px solid">
		<div style="text-align: center; margin: 0px auto">
			La búsqueda <?php echo "'".$txt_criterio."'" ?> arrojó <?php echo $hallados ?> resultados.<br><br>
		</div>
<?php
	}
	function pagina($pag,$sql,$pez,$set,$celdas,$self) {		
		if(isset($_GET['criterio'])){
			$criterio=$_GET['criterio'];
		}
		if(isset($_GET['criterios'])){
			$criterios=$_GET['criterios'];
		}
        if (empty($criterio)){
			$criterio='';
		}
	$txt_criterio = $criterio;
	$pagina=$this->regxpag*$pag;
	$txt_criterio = $criterio;
	$sql.=$pez;
	$sql.="ORDER BY id LIMIT $pagina,$this->regxpag";
	$rs=mysql_query($sql);
	$total=(count($celdas))-1;	
	$percent= 100/($total+1);
	?>
		<div id="galeria" style="text-align: center;  width: 90%; margin: 0px auto; border: 0px solid">
		<table>
			<tr>
	<?php
		for($e=0; $e<=$total;$e++){
	?>
				<td>
					<big><strong><?php echo $celdas[$e]; ?></strong></big>
				</td>
	<?php
		}
	?>	<td>
			<big><strong>cantidad</strong></big>
		</td></tr>
	<?php 	while($row2=mysql_fetch_array($rs)){ ?>
				<tr>
		<?php	for($i=0; $i<=$total;$i++){ ?>
					<td style="text-align: left; border-bottom: 1px dotted; width: <?php echo $percent ?>%; height: 30px;">
						<a href="comprar.php?ruta=comprara_ind.php&id=<?php echo $row2['id'] ?>"><?php echo $row2[$i] ?></a>
					</td>
				<?php } ?>
					<td style=" border-bottom: 1px dotted">
<?php
//echo '<a href="agregacar.php?'. SID.'&id='.$row2['id'].'">comprar</a>';
if(isset($_GET['cantidad'])){
	$cantidad=$_GET['cantidad'];
}
if(empty($cantidad)){
	$cantidad = 1;
}
?>
<form method="GET" action="comprar.php">
	<input type="hidden" name="ruta" value="agregacar.php">
	<input type="number" name="cantidad" value="<?php echo $cantidad ?>">
	<input type="hidden" name="id" value="<?php echo SID.$row2['id'] ?>">
	<input type="hidden" name="rubro" value="<?php echo $row2['id'] ?>">
	<input type="submit" value="comprar">
</form>

	</td>

<?php
				}
?>
</tr></table></div>
<?php		
	}
		function pie($pag,$sql,$pez,$self) {
			if(isset($_GET['criterio'])){
				$criterio=$_GET['criterio'];
			}else{
				$criterio='';
			}
			if(isset($_GET['ruta'])){
				$ruta=$_GET['ruta'];
			}
			$txt_criterio = $criterio;
			$pagina=$this->regxpag*$pag;
			$sql.=$pez;
			$rs=mysql_query($sql);
			$totxlet=mysql_num_rows($rs);
			$pagxlet=ceil($totxlet/$this->regxpag);
?>
		<div style="text-align: center; border: 0px solid; margin: 20px"><br>
<?php
			if ($pagxlet > 1) {
?>
			<div id="gal-indice" "style: border: 0px solid; margin: 0px auto">
<?php
				for ($i=0;$i<$pagxlet;$i++) {
		         	if ($i==$pag){
							echo ($i+1)."\n";
					}else{
	echo "<a href='".$self.".php?ruta=".$ruta."&criterio=".$criterio."&pag=$i'>".($i+1)."</a>";
						if ($i!=($pagxlet-1)){
							echo "&nbsp;|&nbsp;";
						}
					}
				}
?>
			</div>
		</div>
<?php
			}
			?>
		</div>
	</div>
<?php
	}
}
?>