<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prénoms</title>
</head>
<body>
    <form action="traitement.php" method="post">
        <label for="name">Prénom :</label>
        <input name="name" id="name" type="text" />
        <button type="submit">Valider</button>
    </form>
    <form action="traitement.php" method="post">
        <button type="submit" name="reset">Reset</button>
    </form>

    <?php
    session_start();

    if (isset($_SESSION['names']) && !empty($_SESSION['names'])) {
        echo "<h2>Liste de prénoms :</h2>";
        echo "<ul>";
        foreach ($_SESSION['names'] as $name) {
            echo "<li>" . htmlspecialchars($name) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Aucun prénom fourni.</p>";
    }
    ?>
</body>
</html>
