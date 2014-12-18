<? 
class conexion{ 
//Atributos 
	var $id_conn; 
	var $dir_serv; 
	var $contr; 
	var $usuario; 
//Constructores 
	function conexion($x,$y,$z){ 
	    $this->dir_serv=$x; 
	    $this->contr=$y; 
	    $this->usuario=$z; 
	} 
//Metodos 
	function conectar(){ 
		if($this->id_conn=mysql_connect($dir_serv,$contr,$usuario)){ 
		    echo "Conexion correcta"; 
		} 
		else{ 
		    echo "Murio"; 
		} 
	} 
} 
?>
