<?php
$lang = 'ar';
$input = file('fr_CA.po');
$output = fopen($lang.'.po','w');//TODO: make this locale an argument
$translation = file('translations.txt');
$index=0;
foreach($input as $line){
	if(preg_match('/^msgstr/',$line)){
		fputs($output, str_replace('msgid', 'msgstr', $translation[$index]));
		$index++;
	}elseif(preg_match('/^"Language: [^\n]+\n"/',$line)){//"Language: fr_CA\n"
		fputs($output, "\"Language: $lang\n\"");
	}else
		fputs($output, $line);
}
fclose($output);
?>