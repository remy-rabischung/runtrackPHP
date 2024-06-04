<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form connexion</title>
</head>
<body>
    <form action="traitement.php" method="POST">
        <h1>Connexion</h1>
        <label>Nom d'utilisateur :</label>
        <input name="pseudo" id="pseudo" type="text" />
        <label>Mot de passe :</label>
        <input name="mdp" id="mdp" type="text" />
        <button type="submit">Valider</button>
    </form>
</body>
</html>