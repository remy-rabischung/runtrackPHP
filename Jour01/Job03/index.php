<?php

$intVar = 21; // Entier
$floatVar = 3.14; // Flottant
$stringVar = "Bonjour, LaPlateforme!"; // Chaîne de caractères
$boolVar = true; // Booléen

// Tableau HTML
echo "<table border='1'>";
echo "<thead>";
echo "<tr>";
echo "<th>Type</th>";
echo "<th>Nom</th>";
echo "<th>Valeur</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

function addRow($type, $name, $value) {
    echo "<tr>";
    echo "<td>$type</td>";
    echo "<td>$name</td>";
    echo "<td>$value</td>";
    echo "</tr>";
}

addRow("Entier", "\$intVar", $intVar);
addRow("Flottant", "\$floatVar", $floatVar);
addRow("Chaîne de caractères", "\$stringVar", $stringVar);
addRow("Booléen", "\$boolVar", $boolVar ? 'true' : 'false');

echo "</tbody>";
echo "</table>";
?>
