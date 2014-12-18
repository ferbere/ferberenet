<?php
class vent_dIa{
	private $mysql;
	private $cuenta;
	public function __construct($rubro,$robru,$rbr){
		include_once("../classes/mysql.php");
		$this->mysql=new MySQL();
		$this->rubro=$rubro;
		$this->robru=$robru;
		$this->rbr=$rbr;
	}
	public function vent_M(){
		$catch1  = '<h1>Resultados globales del mes</h1>';
		$catch1 .= '<table style="width:50%;">';
		$catch1 .= 	'<tr>';
		$catch1 .=	 	'<th style="text-align:center; border:1px dotted">';
		$catch1 .=	 		'fecha';
		$catch1 .=	 	'</th>';
		$catch1 .=	 	'<th style="text-align:center; border:1px dotted">';
		$catch1 .=	 		'cantidad';
		$catch1 .=	 	'</th>';
		$catch1 .=	 '</tr>';
		$total=0; 
		if(empty($this->rubro)){
			$criterio1  = ' MONTH(abre) = MONTH(curdate()) AND MONTH(cierra) = MONTH(curdate())';
		}else{
			$criterio1  = 'DAY(abre) = '.$this->rubro.' AND DAY(cierra) = '.$this->rubro.' AND MONTH(abre) = '.$this->robru.' AND MONTH(cierra) ='.$this->robru;
		}
		$sql=$this->mysql->consulta("SELECT id,SUM(cantidad),DATE_FORMAT(`abre`,'%d-%m-%Y (%W)'),DAY(abre),MONTH(abre) FROM restaurante_caja WHERE ".$criterio1." GROUP BY DATE_FORMAT(`abre`,'%d-%m-%Y (%W)')");
		while($row=$this->mysql->fetch_array($sql)){
		$catch1 .=	 '<tr>';
		$catch1 .=	 	'<td style="border-bottom:1px dotted;text-align:left">';
		$catch1 .=	 		$row[2];
		$catch1 .=	 	'</td>';
		$catch1 .=	 	'<td style="border-bottom:1px dotted; text-align:right">';
		$catch1 .=	 		'<a href="?reporte.php&ruta=general.php&rubro='.$row[3].'&robru='.$row[4].'">';
		$catch1 .=	 			'$'.number_format($row[1],2);
		$catch1 .=	 		'</a>';
		$catch1 .=	 	'</td>';
		$catch1 .=	 '</tr>';
			$total=$total+$row[1];
			$this->fecha_con_formato=$row[2];
		}
		$catch1 .=	 '<tr>';
		$catch1 .=	 	'<td colspan="2" align="right"><big>';
		$catch1 .=	 		'$'.number_format($total,2);
		$catch1 .=	 	'</big></td>';
		$catch1 .=	 '</tr>';
		$catch1 .=	 '</table>';
		$devuelve1[0]=$catch1;//el fetch completo
		$devuelve1[1]=$this->fecha_con_formato;//sólo el total
		return $devuelve1;
	}
	public function vent_D(){
		if((empty($this->rubro))&&(empty($this->rbr))){
			$criterio2 		= ' AND DATE(restaurante_consumo.abre) != curdate()';
			$criterio2_2	= '';
		}elseif((!empty($this->rubro))&&(empty($this->rbr))){
			$criterio2 		= 'AND DAY(restaurante_consumo.abre) = '.$this->rubro.' AND DAY(restaurante_consumo.cierra) = '.$this->rubro.' AND MONTH(restaurante_consumo.abre) = '.$this->robru.' AND MONTH(restaurante_consumo.cierra) = '.$this->robru;
			$criterio2_2		= '';
		}elseif((empty($this->rubro))&&(!empty($this->rbr))){//encurso
//			$criterio2 		= 'AND DATE(restaurante_consumo.abre) = CURDATE()';
			$criterio2 		= 'AND DATE(restaurante_consumo.abre) = CURDATE() AND restaurante_caja.sesion = 1 ';
			$criterio2_2	= ' INNER JOIN restaurante_caja ON DATE(restaurante_consumo.abre) = DATE(restaurante_caja.abre) ';
		}
		$catch2  = '<table>';
		$catch2 .=	 '<tr>';
		$catch2 .= 		'<th style="text-align:center; border:1px dotted">';
		$catch2 .=		'cantidad';
		$catch2 .=		'</th>';
		$catch2 .=		'<th style="text-align:center; border:1px dotted">';
		$catch2 .=		'producto';
		$catch2 .=		'</th>';
		$catch2 .=		'<th style="text-align:center; border:1px dotted">';
		$catch2 .=		'subtotal';
		$catch2 .=		'</th>';
		$catch2 .= 	'</tr>';
		$total=0;
		$bucle=1;
		$sql=$this->mysql->consulta("SELECT SUM(restaurante_consumo.cantidad) AS cantidad,restaurante_categoria.nombre AS producto,restaurante_index.nombre,restaurante_index.subnombre,restaurante_index.precio FROM restaurante_index INNER JOIN restaurante_consumo ON restaurante_index.id = restaurante_consumo.consumo INNER JOIN restaurante_categoria ON restaurante_index.categoria = restaurante_categoria.id ".$criterio2_2." WHERE restaurante_consumo.estatus != 2 ".$criterio2." GROUP BY restaurante_index.nombre,restaurante_index.subnombre,restaurante_index.categoria ORDER BY cantidad DESC");
		$this->cuenta=$this->mysql->num_rows($sql);
		while($row=$this->mysql->fetch_array($sql)){
			$subtotal=$row[4]*$row[0];
			$catch2 .=	 '<tr>';
			$catch2 .=	 	'<td style="border-bottom:1px dotted;text-align:right">';
			$catch2 .=	 		$row[0];
			$catch2 .=	 	'</td>';
			$catch2 .=	 	'<td style="border-bottom:1px dotted;text-align:left">';
			$catch2 .=	 		$row[1].' '.$row[2].' '.$row[3];
			$catch2 .=	 	'</td>';
			$catch2 .=	 	'<td style="border-bottom:1px dotted; text-align:right">';
			$catch2 .=	 			'$'.number_format($subtotal,2);
			$catch2 .= 		'</td>';
			$catch2 .=	 '</tr>';
			$total=$total+$subtotal;
			$subt_dinero[$bucle]=$subtotal;
			$subt_producto[$bucle]=$row[1].' '.$row[2].' '.$row[3];
			$bucle=$bucle+1;
		}
			$catch2 .=	 '<tr>';
			$catch2 .=	 	'<td colspan="3" align="right"><big>';
			$catch2 .=	 		'$'.number_format($total,2);
			$catch2 .=	 	'</big></td>';
			$catch2 .=	 '</tr>';
			$catch2 .= '</table>';
			$this->devuelve2[0]=$this->cuenta;//cuenta
			$this->devuelve2[1]=$catch2;//el fetch completo
			$this->devuelve2[2]=$total;//el total en dinero
			$this->devuelve2[3]=$subt_dinero;//un array con el subtotal de dinero
			$this->devuelve2[4]=$subt_producto;//un array con el subtotal de producto
			return $this->devuelve2;
	}
	public function vent_St(){
		if((empty($this->rubro))&&(empty($this->rbr))){
			$criterio3 = 'Cifras del mes';
		}elseif((!empty($this->rubro))&&(empty($this->rbr))){
			$criterio3 = 'Cifras del día '.$this->fecha_con_formato;
		}elseif((empty($this->rubro))&&(!empty($this->rbr))){
			$criterio3 = 'Cifras al momento';
		}
			$catch3  = '<div>';
			$catch3 .= 	'<h2>'.$criterio3.'</h2>';
			$catch3 .= 	'<div id="tab">';
			$catch3 .= 		$this->devuelve2[1];
			$catch3 .= 	'</div>';
			$catch3 .= 	'<div id="tabb">';
			$catch3 .= 		'<table>';
		if($this->devuelve2[0]>=8){//Limita a 8 el número de productos en la gráfica
			$max=8;
		}else{
			$max=$this->devuelve2[0];
		}
		for($i=1;$i<=$max;$i++){//Esta es la gráfica
			$porcen=($this->devuelve2[3][$i]*100)/$this->devuelve2[2];
			$catch3 .= 			'<tr>';
			$catch3 .= 				'<td id="uno">'.$this->devuelve2[4][$i].'</td>';
			$catch3 .= 				'<td id="dos">'.number_format($porcen,2).'%</td>';
			$catch3 .= 				'<td id="tres"><div class="shadow" id="div'.$i.'" style="width:'.$porcen.'%"><div></td>';
			$catch3 .= 			'</tr>';
		}
			$catch3 .= 		'</table>';
			$catch3 .= 	'</div>';
			$catch3 .= '</div>';
			$devuelve3 = $catch3;
			return $devuelve3;
	}
}
?>