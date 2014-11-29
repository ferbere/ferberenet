<?php
class privilegios{
	private $priv='';
	public $mysql='';
	public function __construct($sesion,$ruta){
		$this->sesion = $sesion;
		$this->ruta = $ruta;
		include_once('mysql.php');
		$this->mysql=new MySQL();
	}
	public function pRiv(){
		$sql=$this->mysql->consulta("SELECT privilegios FROM gadgets_botones_admin WHERE ruta = '$this->ruta'");
		$this->row=$this->mysql->fetch_array($sql);
		$this->devuelve=$this->row[0];
		return $this->devuelve;
	}
}


?>