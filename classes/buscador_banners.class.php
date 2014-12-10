<?php
session_start();
class paginacion {
	var $regxpag = 10;	// registros por página
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
	function pagina($pag,$sql,$pez,$set,$borra,$celdas,$self,$url_d) {		
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
	$sql.="ORDER BY orden ASC LIMIT $pagina,$this->regxpag";
	$rs=mysql_query($sql);
	$total=(count($celdas))-1;	
	$percent= ($total+1)/100;
	?>
		<div id="galeria" style="text-align: center;  width: 90%; margin: 0px auto; border: 0px solid">
	<?php
		for($e=0; $e<=$total;$e++){
	?>
			<div style="float: left; text-align: left; border-bottom: 0px dotted; width: <?php echo $percent ?>%; height: 20px;">
				<big><strong><?php echo $celdas[$e]; ?></strong></big>
			</div>
	<?php
		}
				while($row2=mysql_fetch_array($rs)){
					if($row2[4]==1){
						$visible = 'Sí';
					}else{
						$visible = 'No';
					}
	?>
				<div style="clear: both"></div>
				<div style="margin:0px auto;text-align:left;width:50%">
				<div style="padding-right:10px;padding-bottom:20px;position:relative;float:left;">
					<a href="<?php echo $self ?>.php?ruta=if_banner_a.php&rubro=<?php echo $row2[0];?>">
					<img src="<?php echo $url_d.$row2[5];?>" width="150px" class="rollover">
					</a>
				</div>
				<div><strong>Id: <?php echo $row2[0];?></strong></div>
				<div><strong>Nombre: <?php echo $row2[1];?></strong></div>
				<div><strong>En la maqueta: </strong><?php echo $row2[2];?></div>
				<div><strong>Orden: </strong><?php echo $row2[3];?></div>
				<div><strong>Publicado: </strong><?php echo $visible;?></div>
				<div><strong>Imagen: </strong><?php echo $row2[5].".".$row2[6];?></div>
				<div><strong>Publicado en: </strong><?php echo $row2[7];?></div>
				<div><a href="<?php echo $self ?>.php?ruta=borra.php&borra=<?php echo $borra ?>&rubro=<?php echo $row2[0] ?>">
						Borrar
					</a>
				</div>
				<div><hr></div>
				</div>
<?php
				}
?>
</div>
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