<?php
if(isset($_GET['rubro'])){
	$rubro=$_GET['rubro'];
}

/*

echo 'Los privilegios en binario sería; '.decbin($privilegios).'<br><br>';
$sql2=mysql_query("SELECT id,nombre FROM usuario_privilegios");
$i=1;
while($row2=mysql_fetch_array($sql2)){
	if($row2[0]==$privilegios){
		$high='checked';
	}else{
		$high='nain';
	}
	echo '<input type="checkbox" name="privilegios" value="'.$row2[0].'"'.$high.'>'.$row2[1].'<br>';
	//$var[$i]=
}
*/
	include_once("classes/mysql.php");
	$mysql=new MySQL();
	$sql=$mysql->consulta("SELECT nombre FROM usuario_privilegios");
	$var_num=$mysql->num_rows($sql);
if(empty($rubro)){
	echo '<form action="codigo.php" method="GET">';
	echo '<input type="hidden" name="ruta" value="if_codigo.php">';
	echo '<input type="hidden" name="rubro" value="1">';
	$i=1;
	while($row=mysql_fetch_array($sql)){
		echo '<input type="checkbox" name="privilegios'.$i.'" value="1">'.$row[0].'<br>';
		$i=$i+1;
	}
	echo '<input type="submit" value="a ver">';
}elseif($rubro==1){
	if(isset($_GET['privilegios1'])){
		$privilegios1=$_GET['privilegios1'];
	}else{
		$privilegios1=0;
	}
	if(isset($_GET['privilegios2'])){
		$privilegios2=$_GET['privilegios2'];
	}else{
		$privilegios2=0;
	}
	if(isset($_GET['privilegios3'])){
		$privilegios3=$_GET['privilegios3'];
	}else{
		$privilegios3=0;
	}
	if(isset($_GET['privilegios4'])){
		$privilegios4=$_GET['privilegios4'];
	}else{
		$privilegios4=0;
	}
	if(isset($_GET['privilegios5'])){
		$privilegios5=$_GET['privilegios5'];
	}else{
		$privilegios5=0;
	}
	$chain=$privilegios5.$privilegios4.$privilegios3.$privilegios2.$privilegios1;
	echo 'En binario es: '.$chain.', lo que vale: ';
	$bin=bindec($chain);
	echo $bin;
	echo '<br><br><a href="codigo.php?ruta=if_codigo.php&rubro=2">Dale</a>';
}elseif($rubro==2){
	$sql2=mysql_query("SELECT id,gadget,privilegios FROM gadgets_index WHERE id = 2 ");
	while($row2=mysql_fetch_array($sql2)){
		$id				= $row2[0];
		$gadget			= $row2[1];
		$privilegios	= $row2[2];
	}
	$sql3=mysql_query("SELECT id,nombre FROM usuario_privilegios");
	$h=1;
	while($row=mysql_fetch_array($sql2)){
		if($row2[0]==$privilegios){
			$high='checked';
		}else{
			$high='nain';
		}
		echo '<input type="checkbox" name="privilegios" value="'.$row2[0].'"'.$high.'>'.$row2[1].'<br>';
	/*
	echo $privilegios;
	$son = strlen($chain);
	for($e=1;$e<=$var_num;$e++){
		echo '<input type="checkbox" name="privilegios'.$e.'" value="'.$chain{$e-1}.'">'.$variables[$e].' '.$chain{$e-1}.'<br>';
	}*/
}
?>
