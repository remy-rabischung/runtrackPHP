<?php
if (isset($_GET['arg']) && !empty($_GET['arg'])) {
    $arg = $_GET['arg'];
    $number = explode(',', $arg);
    echo "Nombre d'arguments : " . count($number);
} else {
    echo "Aucun argument fourni.";
}
?>
