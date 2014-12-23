<?php
include_once("classes/mysql.php");
$mysql=new MySQL();
$mysql2=new MySQL();
$mysql3=new MySQL();
if(isset($_GET['rubro'])){
	$rubro=$_GET['rubro'];
}
$sql=$mysql->consulta("SELECT contenido,categoria FROM codigo_index");
$row=$mysql->fetch_array($sql);
$query=$row[0];
$tipo =$row[1];
echo 'El código es: <br><br><code>'.$query.'</code><br><br>';
echo 'Ahí va:<br><br>';
if($tipo==1){
	/* empieza código php */
	$tope=61;
	//$arra='';
	for($i=1;$i<=$tope;$i++){
	/* termina código php */
		$sql_c=$mysql2->consulta($query.' where bunker.gadgets_botones_admin.id = '.$i);
 		$row_c=$mysql->fetch_array($sql_c);
 		$arra[$i] = $row_c[0];
 		UPDATE gadgets_botones_admin SET imagen = 'fa-plus-square-o' WHERE imagen = 'new'
// 		echo $arra[$i].'<br>'.$i.'<br>';
// 		$pp=$mysql3->consulta("UPDATE gadgets_botones_admin SET imagen = '$arra[$i]' WHERE id = ".$i);
 	// otro poco de php
 	}
 	
 	// ya

}elseif($tipo==2){
	echo "<?php ".$query."; ?>";
}
?>