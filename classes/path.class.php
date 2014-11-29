<?php
class path{
	public function __construct(){
		include_once("classes/mysql.php");
		$this->mysql=new MySQL();
	}
	public function the_path(){
		$sql=$this->mysql->consulta("SELECT url,pagina FROM template_general");
		$row=$this->mysql->fetch_array($sql);
		$url[0]=$row[0];
		$url[1]=$row[1];
		return $url;
	}
}




?>