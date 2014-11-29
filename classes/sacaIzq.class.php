<?php
function sacaIzq($TheStr, $sLeft){ 
	$pleft = strpos($TheStr, $sLeft); 
	if ($pleft !== false){ 
		return (substr($TheStr, $pleft + strlen($sLeft))); 
	} 
	return ''; 
}
?>



