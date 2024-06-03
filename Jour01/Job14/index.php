<?php

function leetSpeak($str) {
    $leetChars = array(
        'a' => '4',
        'e' => '3',
        'i' => '1',
        'o' => '0',
        's' => '5'
    );

    $leetStr = str_replace(array_keys($leetChars), array_values($leetChars), strtolower($str));
    
    return $leetStr;
}

$inputStr = "Hello World!";
echo "Leet speak de '$inputStr' : " . leetSpeak($inputStr);

?>
