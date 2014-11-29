<?php
session_start();
include_once('classes/mysql.php');
$mysql=new MySQL();

$sql=$mysql->consulta("SELECT url,pagina FROM template_general");
$url=$mysql->fetch_array($sql);
$path=$url[0].'/'.$url[1].'/'.$_SESSION['admin'].'/images/catalogo/';
if(empty($url[1])){
	$url_c='http://localhost/';
}else{
	$url_c='http://'.$url[1].'/';
}
$path=$url_c.$_SESSION['admin'];
session_unset();
session_destroy();
?>
<script type="text/javascript">
	window.location = "<?php echo $path; ?>?adios=1"
</script>