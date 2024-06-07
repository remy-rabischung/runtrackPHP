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

$sql = 'SELECT salle.nom AS salle_nom, etage.nom AS etage_nom FROM salle JOIN etage ON salle.id_etage = etage.id';
try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $salles_etages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('Erreur de requête : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des salles avec leur étage correspondant</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Liste des salles avec leur étage correspondant</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Etage</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salles_etages as $se): ?>
                <tr>
                    <td><?php echo htmlspecialchars($se['salle_nom']); ?></td>
                    <td><?php echo htmlspecialchars($se['etage_nom']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
