<?php
//RECORTE
function cut_string($string, $charlimit)
{
if(substr($string,$charlimit-1,1) != ' ')
{
$string = substr($string,'0',$charlimit);
$array = explode(' ',$string);
array_pop($array);
$new_string = implode(' ',$array);

return $new_string.' ...';
}
else
{ 
return substr($string,'0',$charlimit-1).' ...';
}
}
//RECORTE

?>