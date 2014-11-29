<?php
class bali {
	var $resultado;
	function asaber($a,$b){
		$this->resultado=$a*$b;
	}
	function imprime(){
		echo $this->resultado.'<br>';
	}
}
?>