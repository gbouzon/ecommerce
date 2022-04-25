<?php
$output = fopen('keys.txt','w');
$translation = file('fr_CA.po');//must have an example but the translations are not needed
foreach($translation as $line){
	if(preg_match('/^msgid/',$line))
		fputs($output, $line);
}
fclose($output);
?>