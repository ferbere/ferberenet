<?php
session_start();
error_reporting(0);
class paginacion {
	var $regxpag = 10;	// registros por página
	function cuantos($sql,$pez,$rubro){
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
	function pagina($pag,$sql,$pez,$set,$borra,$celdas,$self,$rubro,$sql2) {		
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
	$sql.="ORDER BY id ASC LIMIT $pagina,$this->regxpag";
	$rs=mysql_query($sql);
	$total=(count($celdas))-1;
	$percent= 100/($total+1);
	$rs2=mysql_query($sql2);
	?>
		<div id="galeria" style="text-align: center;  width: 90%; margin: 0px auto; border: 0px solid">
	<?php
				while($row2=mysql_fetch_array($rs)){
	?>
				<div style="clear: both"></div>
				<div style="margin:0px auto;text-align:left;width:50%">
				<div style="padding-right:10px;padding-bottom:20px;position:relative;float:left;">
					<a href="gadgets/catalogo/ip_asigna_a.php?rubro=<?php echo $rubro;?>&pieza=<?php echo $row2[0];?>">
					<img src="../<?php echo $_SESSION['admin']?>/images/catalogo/<?php echo $row2[3]; ?>" width="150px" class="rollover">
					</a>
				</div>
				<div><strong>Nombre: <?php echo $row2[1];?></strong></div>
				<div><strong>Categoría: </strong><?php echo $row2[2];?></div>
				<div><strong>Imagen: </strong><?php echo $row2[3];?></div>
				<div><strong>Asignado: </strong><?php
					if($row2[4]==$rubro){
						echo 'Sí';
					}else{
						echo 'No';
					}
				?></div>
				<div style="clear:both"><hr></div>
				</div>
<?php
				$j++;
				}
?>
</div>
<?php		
	}
		function pie($pag,$sql,$pez,$self,$rubro) {
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
	echo "<a href='".$self.".php?ruta=".$ruta."&rubro=".$rubro."&criterio=".$criterio."&pag=$i'>".($i+1)."</a>";
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
<?php
	}
}
?>
