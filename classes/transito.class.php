<?php
class transito{
	private $reparte='';
	private $cliente='';
	private $sal='';
	public $mysql='';
	public $fetch='';
	public $cachador='';
	public function __construct($rep,$cli){//(quién reparte,el cliente)
		$this->reparte=$rep;
		$this->cliente=$cli;
		session_start();
		include_once("../classes/navbar.class.php");
		include_once("../classes/subtotal_cliente.class.php");
		include_once("../classes/mysql.php");
		$this->mysql=new MySQL();
	}
	public function tR(){
		if((!empty($this->reparte))&&(!empty($this->cliente))){
			$this->fetch= "WHERE (restaurante_consumo.estatus = 0 OR restaurante_consumo.estatus = 3) AND restaurante_consumo.mesa = 0 AND restaurante_clientes.id = ".$this->cliente;
		}else{
			$this->fetch="";
		}
		
	}
	public function tRan(){
	$sql2=$this->mysql->consulta("SELECT restaurante_consumo.id,restaurante_index.nombre,restaurante_index.precio,restaurante_consumo.cantidad,restaurante_index.precio*restaurante_consumo.cantidad as subcuenta,restaurante_categoria.nombre,restaurante_clientes.nombre,restaurante_domicilios.direccion,restaurante_clientes.id,restaurante_estatus.nombre,restaurante_domicilios.cruza1,restaurante_domicilios.cruza2,restaurante_estatus.id FROM restaurante_index INNER JOIN restaurante_consumo ON restaurante_index.id = restaurante_consumo.consumo INNER JOIN restaurante_categoria ON restaurante_index.categoria = restaurante_categoria.id INNER JOIN restaurante_clientes ON restaurante_consumo.cliente = restaurante_clientes.id INNER JOIN restaurante_estatus ON restaurante_consumo.estatus = restaurante_estatus.id INNER JOIN restaurante_domicilios ON restaurante_clientes.id = restaurante_domicilios.cliente ".$this->fetch);
		$suma=0;
		while($row2=$this->mysql->fetch_array($sql2)){
			$varia[]=$row2[8];//Cliente id
			if($row2[12]==3){//estatus id
				$sql3=$this->mysql->consulta("SELECT restaurante_estatus.nombre,usuario_index.user,usuario_index.id,restaurante_estatus.id FROM restaurante_estatus INNER JOIN restaurante_entrega ON restaurante_estatus.id = restaurante_entrega.estatus INNER JOIN usuario_index ON restaurante_entrega.repartidor = usuario_index.id WHERE restaurante_entrega.cliente = '$this->cliente' ");//Asignado a qué repartido
				$row3=$this->mysql->fetch_array($sql3);
				if($row3[0]!=''){//estatus
					$estatus = $row3[0];
					$estatus_id=$row3[3];
				}else{
					$estatus=$row2[9];
					$estatus_id=$row2[12];
				}
				
			}else{
				$estatus=$row2[9];
				$estatus_id=$row2[12];
			}
			$nombre = '<div class="link_t"><a href="?ruta=if_a.php&rubro=0&xyo='.$id.'">'.$row2[6].'</a></div><br> <small>('.$row2[7].', entre '.$row2[10].' y '.$row2[11].')</small><br> <span id="estatus">'.$estatus.'</span>';
		    $subcuentas[$nombre][] = '<td><b>'.$row2[1].'</b></td><td>'.$row2[3].'</td><td class="peq">x ($'.$row2[2].')</td><td>-></td><td>$'.$row2[4].'</td>';
		}
			$catch = '<table id="if_a">';
		    foreach ($subcuentas as $nombre => $desglose){
				$catch .= '<tr><td colspan="5"><h3>'.$nombre.'</h3></td></tr>';
		    	foreach ($desglose as $consumo){
					$catch .= '<tr>'.$consumo.'</tr>';
		    	}	
				$soc=new sCliente($this->cliente);
				$file=$soc->sClie();
					$catch .= '<tr>';
					$catch .= 	'<td colspan="4">';
					$catch .= 		'<div id="nb_tra">';
					$varias=array_unique($varia);
					$variasd=array_values($varias);
					$naa=new navBar(5,$variasd[$suma],$estatus_id);
					$catch .= $naa->nB();
					$catch .= 		'</div>';
					$catch .= 	'</td>';
					$catch .= 	'<td id="if_a-total">';
					$catch .= 		'Total $'.$file;
					$catch .= 	'</td>';
					$catch .= '</tr>';
					$suma=$suma+1;
		    }
	    	$catch .= '</table>';
			$this->cachador=$catch;
					return $this->cachador;
	}

}
?>