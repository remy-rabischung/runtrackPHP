<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat des Arguments GET</title>
</head>
<body>
    <?php
    if (isset($_GET['arg']) && !empty($_GET['arg'])) {
        $arg = $_GET['arg'];
        $arguments = explode(',', $arg);
        
        echo "<h2>Nombre d'arguments : " . count($arguments) . "</h2>";
        echo "<table border='1' style='width: 50%; margin: 20px auto; border-collapse: collapse;'>";
        echo "<thead>";
        echo "<tr><th>Argument</th><th>Valeur</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        
        foreach ($arguments as $index => $argument) {
            echo "<tr>";
            echo "<td>Argument " . ($index + 1) . "</td>";
            echo "<td>" . htmlspecialchars($argument) . "</td>";
            echo "</tr>";
        }
        
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>Aucun argument fourni.</p>";
    }
    ?>
</body>
</html>
