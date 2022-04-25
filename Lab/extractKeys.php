<?php

    $output = fopen('keys.txt', 'w');
    $translation = file('messages.pot');
    foreach($translation as $line) {
        if (preg_match('/^msgid/', $line)) {
            fputs($output, str_replace('msgid', 'msgstr', $translation[$index]));
            $index++;
        }
        else 
            fputs($output, $line);
    }
    fclose($output);
?>