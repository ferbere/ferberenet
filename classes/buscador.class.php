<?php
class paginacion {
	var $regxpag = 25;	// registros por página
	public function __construct($pez,$self){
		$sql=$sql;
		$this->pez=$pez;
		$this->self=$self;
		if(isset($_GET['criterio'])){
			$this->criterio = $_GET['criterio'];
		}else{
			$this->criterio='';
		}
		$this->txt_criterio = $this->criterio;
		if(isset($_GET['ruta'])){
			$ruta=$_GET['ruta'];
		}
		$this->ruta=$ruta;
	}
	function cuantos($sql){
		$sql.=$this->pez;
		$rs=mysql_query($sql);
		$hallados=mysql_num_rows($rs);
		$catch1[0]  =	'<div style="text-align: center; margin: 0px auto">';
		$catch1[0] .=		'La búsqueda "'.$this->txt_criterio.'" arrojó '.$hallados.' resultados.<br><br>';
		$catch1[0] .=	'</div>';
		$catch1[1]  =	$hallados;
		$this->qty 	=	$hallados;
	return $catch1;
	}
	function pagina($pag,$sql,$set,$order,$borra,$celdas) {
		$pagina=$this->regxpag*$pag;
		$sql.=$this->pez;
		$sql.=$order."$pagina,$this->regxpag";
		$rs=mysql_query($sql);
		$total=(count($celdas))-1;	
		$percent= 100/($total+1);
		$catch2	 =	'<div id="galeria">
						<table>
							<tr>';
		for($e=0; $e<=$total;$e++){
			$catch2	.=			'<td class="strong">'.$celdas[$e].'</td>';
		}
		while($row=mysql_fetch_array($rs)){
			if($row[0]!=0){
				$catch2	.=	'<tr>';
				for($i=0; $i<=$total;$i++){
					if($i==0){
						$tre=($row[0]-$this->qty);
					}else{
						$tre=$row[$i];
					}
					$catch2	.=		'<td>
										<a href="'.$this->self.'.php?ruta='.$set.'&rubro='.$row[$total+1].'">';
					$catch2 .=				$tre;
					$catch2	.=			'</a>
									</td>';
				}
					$catch2 .= 		'<td>';
					$catch2 .= 			'<a href="'.$this->self.'.php?ruta=borra.php&borra='.$borra.'&rubro='.$row['id'].'">';
					$catch2 .= 				'borra';
					$catch2	.=			'</a>';
					$catch2 .= 		'</td>';
			}
		}
				$catch2	.=	'</tr>
						</table>';
		$catch2	 .=	'</div>';
		return $catch2;
	}
		function pie($pag,$sql) {
			$pagina=$this->regxpag*$pag;
			$sql.=$this->pez;
			$rs=mysql_query($sql);
			$totxlet=mysql_num_rows($rs);
			$pagxlet=ceil($totxlet/$this->regxpag);
			$catch3	 =	'<div>';
			if ($pagxlet > 1) {
			$catch3	.= 		'<div id="gal-indice">';
				for ($i=0;$i<$pagxlet;$i++) {
		         	if ($i==$pag){
						$catch3	.= ($i+1)."\n";
					}else{
						$catch3	.= "<a href='".$this->self.".php?ruta=".$this->ruta."&criterio=".$this->criterio."&pag=$i'>";
						$catch3	.=		($i+1);
						$catch3	.=	"</a>";
						if ($i!=($pagxlet-1)){
						$catch3	.= "&nbsp;|&nbsp;";
						}
					}
				}

			$catch3	.=		'</div>
						</div>';
			return $catch3;
		}
	}
}
?>