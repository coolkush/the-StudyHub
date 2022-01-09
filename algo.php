<?php 


$ts = time();
$ts = 1613907902;
$tsl = str_split($ts);
$ps = "Password";
$psl = str_split($ps);
echo "Current time key: ".$ts;
echo "<br>";
echo "Plain text: ".$ps;
echo "<br>";


#encryptor
for ($i=0; $i < count($psl) ; $i++) { 
	$psl[$i]= chr(ord($psl[$i]) + (int)($tsl[count($tsl)-1-$i]));
}
echo "Encrypted text: ".implode("", $psl);
echo "<br>";

#decryptor
for ($i=0; $i < count($psl) ; $i++) { 
	$psl[$i]= chr(ord($psl[$i]) - (int)($tsl[count($tsl)-1-$i]));
}
echo "Encrypted text: ".implode("", $psl);

?>