<?php
session_start();

// Vérifie si le bouton reset a été cliqué
if (isset($_POST['reset'])) {
    $_SESSION['nbVisites'] = 0;
} else {
    // Incrémente le compteur de visites
    if (isset($_SESSION['nbVisites'])) {
        $_SESSION['nbVisites']++;
    } else {
        $_SESSION['nbVisites'] = 1;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Compteur de visites</title>
</head>
<body>
    <h1>Nombre de visites : <?php echo $_SESSION['nbVisites']; ?></h1>
    <form method="post">
        <button type="submit" name="reset">Reset</button>
    </form>
</body>
</html>