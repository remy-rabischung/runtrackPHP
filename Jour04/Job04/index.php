<?php

session_start();

if (isset($_POST['deco'])) {
    setcookie('prenom', '', time() - 3600);
    header("Location: index.php");
    exit();
}

if (isset($_POST['prenom']) && !empty($_POST['prenom'])) {
    $prenom = htmlspecialchars($_POST['prenom']);
    setcookie('prenom', $prenom, time() + 30 * 24 * 3600);
    header("Location: index.php");
    exit();
}

$prenom = isset($_COOKIE['prenom']) ? $_COOKIE['prenom'] : '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <?php if ($prenom): ?>
        <p>Bonjour <?php echo htmlspecialchars($prenom); ?> !</p>
        <form action="index.php" method="post">
            <button type="submit" name="deco">Déconnexion</button>
        </form>
    <?php else: ?>
        <form action="index.php" method="post">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
            <button type="submit" name="connexion">Connexion</button>
        </form>
    <?php endif; ?>
</body>
</html>
