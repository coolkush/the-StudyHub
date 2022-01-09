<?php

function encrypter($psl,$tsl)
{
    $psl = str_split($psl);
    $tsl = str_split($tsl);
    for ($i=0; $i < count($psl) ; $i++) { 
    $psl[$i]= chr(ord($psl[$i]) + (int)($tsl[count($tsl)-1-$i]));
}
return implode("", $psl);
}

?>

