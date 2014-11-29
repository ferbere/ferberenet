<?php
function sacaDer($TheStr, $sRight){ 
	$pright = strpos($TheStr, $sRight); 
	if ($pright !== false){ 
		return substr($TheStr, $sRright,$pright); 
	} 
	return ''; 
}
?>



