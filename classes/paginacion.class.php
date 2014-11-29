<?php
class paginacion {

//	var $cn;				// almacenará la conexión actual
//	private $sql;		// cadena sql de consulta
//	var $rs;				// resultado de la consulta
	var $regxpag = 9;	// registros por página
//	private $pagina;	// página actual
//	private $imagen;	// letra actual
//	private $totxlet;	// total de provincias por letra
//	private $pagxlet;	// total de páginas por letra
/*
	function __construct() {
		$this->cn = mysql_connect("localhost","root","");
		if (!$this->cn){
			exit("Error de Acceso "+mysql_error());
		}
		if (!mysql_select_db("granja")){
			exit("Error de BD "+mysql_error());
		}
	}
*/
	function pagina($pag) {
		if(isset($_GET['imagen'])){
			$imagen=$_GET['imagen'];
		}
		$this->pagina=$this->regxpag*$pag;
		$this->sql="SELECT id,nombre,ext FROM fotos ";
		$this->sql.="WHERE vincula = '$imagen' ";
		$this->sql.="ORDER BY id LIMIT $this->pagina,$this->regxpag";

		$this->rs=mysql_query($this->sql);
		while ($reg=mysql_fetch_assoc($this->rs)) {
?>
			<div id="galeria">
<?php			if($reg['ext']!='jpg'){
?>
				<div>
		<a href="images/<?php echo $reg['nombre'].'.'.$reg['ext']; ?>" target="_blank">	<img src="images/<?php echo $reg['nombre'].'.jpg' ?>" width="150px" height="80" class="rollover"></a>
<?php
				}else{
?>
				<div id="gallery">
					<a href="images/<?php echo $reg['nombre'].'.'.$reg['ext']; ?>">
						<img src="images/<?php echo $reg['nombre'].'.'.$reg['ext']; ?>" width="200px" class="rollover" id="imginst"></a>

<?php
				}
?>
				</div>
			</div>
<?php
		}
	}
	function pie($pag) {
		if(isset($_GET['imagen'])){
			$imagen=$_GET['imagen'];
		}
		$this->sql="SELECT id FROM fotos WHERE vincula = '$imagen' ";
		$this->rs=mysql_query($this->sql);
		$this->totxlet=mysql_num_rows($this->rs);
		$this->pagxlet=ceil($this->totxlet/$this->regxpag);
		if ($this->pagxlet > 1) {
			echo "<div id='gal-indice'>";
			for ($i=0;$i<$this->pagxlet;$i++) {
	         	if ($i==$pag){
						echo ($i+1)."\n";
				}else{
					echo "<a href='".$_SERVER['PHP_SELF']."?rubro=4&imagen=$imagen&pag=$i'>".($i+1)."</a>";
					if ($i!=($this->pagxlet-1)){
						echo "&nbsp;|&nbsp;";
					}
				}
			}
			echo "</div>";
		}
	}
}
?>