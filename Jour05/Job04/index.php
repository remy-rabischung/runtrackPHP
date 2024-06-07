<?php

$dsn = 'mysql:host=localhost;port=3307;dbname=jour05';
$username = 'root'; 
$password = ''; 

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

$sql = 'SELECT nom, id_etage, capacite FROM salle';

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('Erreur de requête : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des salles</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Liste des salles</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Etage</th>
                <th>Capacité</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etudiants as $etudiant): ?>
                <tr>
                    <td><?php echo htmlspecialchars($etudiant['nom']); ?></td>
                    <td><?php echo htmlspecialchars($etudiant['id_etage']); ?></td>
                    <td><?php echo htmlspecialchars($etudiant['capacite']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
