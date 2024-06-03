<?php

function occurrences($str, $char) {
    $count = 0;
    $length = strlen($str);
    for ($i = 0; $i < $length; $i++) {
        if ($str[$i] == $char) {
            $count++;
        }
    }
    return $count;
}

$str = "Bonjour";
$char = "o";
echo "Le nombre d'occurrences de '$char' dans '$str' est : " . occurrences($str, $char) . "<br>";

$str = "plateforme";
$char = "p";
echo "Le nombre d'occurrences de '$char' dans '$str' est : " . occurrences($str, $char);

?>
