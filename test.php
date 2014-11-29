<?php
include_once("../classes/mysql.php");
$mysql = new MySQL();
$sql=$mysql->consulta("SELECT usuario_index.id,usuario_index.user,usuario_index.passwd,usuario_privilegios.nombre,usuario_privilegios.id FROM usuario_index,usuario_privilegios WHERE usuario_index.user = 'alicia' AND usuario_index.privilegios = usuario_privilegios.id ");
$datos = $mysql ->fetch_array($sql);
//print_r ($datos);
echo 'Usuario id->'.$datos[0].'<br>';
echo 'Usuario nombre->'.$datos[1].'<br>';
echo 'Usuario privilegios->'.$datos[2].'<br>';
echo 'Usuario privilegios_id->'.$datos[3].'<br>';


?>