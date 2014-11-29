<?php
class caja_eStatus{
	public $sesion;
	public $abre;
	public $total;
	public $mysql;
	public function __construct(){
		session_start();
//		include_once("../classes/transito.class.php");
		include_once("classes/mysql.php");
		$this->mysql=new MySQL();	
	}
	public function caja_Es(){//Caja on/off
		
		$sql=$this->mysql->consulta("SELECT cajero,sesion,abre,fondo FROM caja_index WHERE sesion = 1 ");
		while($row=$this->mysql->fetch_array($sql)){
			$this->sesion	= $row[1];
			$this->abre 	= $row[2];
			$this->fondo	= $row[3];
		}
			if(empty($this->sesion)){
				$retacha	= '<strong>Caja off.</strong>';
			}else{
				$retacha	= '<strong>Caja on.</strong>';
			}
			return $retacha;
	}
	public function caja_Ct(){
/*
		if(!empty($this->sesion)){
			$sql2=$this->mysql->consulta("SELECT SUM(restaurante_index.precio*restaurante_consumo.cantidad) AS total FROM restaurante_index INNER JOIN restaurante_consumo ON restaurante_index.id = restaurante_consumo.consumo WHERE restaurante_consumo.mesa > 0 AND restaurante_consumo.estatus != 2 AND restaurante_consumo.cierra BETWEEN '$this->abre' AND CURRENT_TIMESTAMP ");
			while($row2=$this->mysql->fetch_array($sql2)){
				$this->total=$row2[0];
			}
		}else{
			$this->total='';
		}*/
		$this->total=5000;
		return $this->total;
	}
	public function caja_Fn(){//El fondo incial de la caja
		return	$this->fondo;
	}/*
	public function caja_Re(){
		$sait=new transito(6,17);
		$sai=$sait->tRan();
		return	$sai;
	}*/
}
?>