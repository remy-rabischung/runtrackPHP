<?php
if (isset($_GET["nb"])) {
    $nb = intval($_GET["nb"]);
    if ($nb % 2 == 1) {
        echo "Nombre Impair";
    } else {
        echo "Nombre Pair";
    }
} else {
    echo "Veuillez entrer un nombre entier valide.";
}

?>
