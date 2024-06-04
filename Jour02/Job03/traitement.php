<?php
if (isset($_POST['arg']) && !empty($_POST['arg'])) {
    $arg = $_POST['arg'];
    $number = explode(',', $arg);
    echo "Nombre d'arguments : " . count($number);
} else {
    echo "Aucun argument fourni.";
}
?>
