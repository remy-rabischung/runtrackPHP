<?php

function occurrences($str, $char){
    $count = 0;
    $length = strlen($str);
    for ($i = 0; $i < $length; $i++) {
        if ($str[$i] == $char) {
            $count++;
        }
    }
    return $count;
}

$str = "Bonsoir";
$char = "o";
echo ("Le nombre d'occurrences de '$char' dans '$str' est : " . occurrences($str, $char)) . "<br>";

$str = "alternance";
$char = "a";
echo ("Le nombre d'occurrences de '$char' dans '$str' est : " . occurrences($str, $char));


?>