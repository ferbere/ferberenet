<?php
session_start();
class bucleSub{
	public $quiz='';
	public $quiz2='';
	public $id_1q='';
	public $id_1q2='';
	public $itera='';
	public $referencia='';
	private $bs='';
	public $mysql='';
	private $p='';
	private $r='';
	public $tot_preg='';
	private $tot_preg2='';
	public function __construct($qq,$it,$t,$id){//("#Quiz","iteracion","Total preguntas del quiz")
		$this->quiz=$qq;
		$this->itera=$it;
		$this->id_1q=$id;
		$this->mysql=new MySQL();
		$this->tot_preg2=$t;
	}
	public function qQ(){//Devuelve el total de preguntas del Quiz
	$sql1=$this->mysql->consulta("SELECT quiz_index.id,quiz_ques.id FROM quiz_index INNER JOIN quiz_ques ON quiz_index.id = quiz_ques.quiz WHERE quiz_index.visible = 1");
	$this->tot_preg=$this->mysql->num_rows($sql1);
	$row1=$this->mysql->fetch_array($sql1);
	$this->quiz2=$row1[0];
	$this->id_1q2=$row1[1];
	$devuelve1[0]=$this->tot_preg;
	$devuelve1[1]=$this->quiz2;
	$devuelve1[2]=$this->id_1q2;
	return $devuelve1;
	}
	public function bS(){//Estructura el formulario de Entrevista
				$this->referencia = ($this->tot_preg2+$this->id_1q)-1;
/*				echo 'referencia: '.$this->referencia.'<br>';
				echo 'itera: '.$this->itera.'<br>';
				echo 'id: '.$this->id_1q.'<br>';*/
		if($this->itera<$this->referencia){//Si iteracion no supera total de preguntas
		$sql2=$this->mysql->consulta("SELECT quiz_index.nombre,quiz_ques.id as ques_id,quiz_ques.pregunta,quiz_answ.id as answ_id,quiz_answ.respuesta,quiz_ques.contenido,quiz_ques.imagen FROM quiz_index INNER JOIN quiz_ques ON quiz_index.id = quiz_ques.quiz INNER JOIN quiz_answ ON quiz_ques.id = quiz_answ.ques WHERE quiz_ques.id = '$this->itera' AND quiz_index.id = '$this->quiz' ");
			while($row2=$this->mysql->fetch_array($sql2)){
				$nombre		= $row2[0];
				$pregunta	= $row2[1];
				$titulo 	= $row2[2];
				$respuesta	= $row2[3];
				$contenido	= $row2[5];
				$imagen		= $row2[6];
				$contador	= 1;
			    $ques[$titulo][] = '<td style="text-align:left;border-bottom:1px dotted">'.$row2[4].'</td><td style="text-align:center;border-bottom:1px dotted"><input type="radio" name="q'.$contador.'" value="'.$respuesta.'"></td>';
				$contador	= $contador+1;
			}
				$as= '<table border="0">';
				$as.= '<tr><td colspan="2"><div id="bsclass"><img src="images/encuesta/'.$imagen.'"></div></td></tr>';
				$as.= '<tr><td colspan="2"><h1>'.$nombre.'</h1></td></tr>';
				$as.= '<tr><td colspan="2"><p>'.$contenido.'</p></td></tr>';
				$as.= '<form action="encuesta.php" method="post">';
				$as.= '<input type="hidden" name="preg" value="'.$pregunta.'">';
				$as.= '<input type="hidden" name="sub" value="'.($pregunta+1).'">';
			    foreach ($ques as $titulo => $desglose){
				$as.= '<tr><td colspan="2"><h2>'.$titulo.'</h2></td></tr>';
			    	foreach ($desglose as $respuestas){
				$as.= '<tr>'.$respuestas.'</tr>';
			    	}	
			    }
				$as.= '<tr><td></td><td style="text-align:center">';
				$as.= '<input type="submit" value="votar">';
				$as.= '</td></tr>';
				$as.= '</form>';
				$as.= '</table>';
				$this->bs=$as;
				return $this->bs;
		}else{
			return "Muchas gracias por participar.";
		}
	}
	public function qSess(){
		if(isset($_POST['preg'])){
			$preg=$_POST['preg'];
		}
		if(isset($_POST['q1'])){
			$q1=$_POST['q1'];
		}
		$this->p='pregunta'.($this->itera-1);
	 	$this->r='respuesta'.($this->itera-1);
		if(($this->itera-1)>=1){
			$_SESSION['quiz'][$this->p]=$preg;
			$_SESSION['quiz'][$this->r]=$q1;
		}
		if($this->itera>=$this->referencia){
			for($i=($this->itera-$this->tot_preg2);$i<=$this->referencia;$i++){
				$pd='pregunta'.$i;
				$rd='respuesta'.$i;
				if($i==(($this->referencia-$this->tot_preg2)-1)){
					$unsession .= $_SESSION['quiz'][$rd];
				}else{
					$unsession .= $_SESSION['quiz'][$rd].' ';
				}
			}
		}
			$devuelve[1]=$this->quiz;
			$devuelve[2]=$unsession;
			return $devuelve;
	}
}
?>