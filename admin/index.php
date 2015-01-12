<?php
require_once('../classes/sacar.class.php');
if(isset($pagina)){
	$pagina=$_GET['pagina'];
}
$pagina= sacar($_SERVER['PHP_SELF'],"/","/admin");
?>
<script>window.location.href="../../ferberenet/index.php?pagina=<?php echo $pagina; ?>"</script>