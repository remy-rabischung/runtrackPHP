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

$sql = 'SELECT SUM(superficie) as superficie_totale FROM etage';

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('Erreur de requête : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supercie totale des étages</title>
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
    <h1 style="text-align: center;">Supercie totale des étages</h1>
    <table>
        <thead>
            <tr>
                <th>superficie_totale</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo htmlspecialchars($result['superficie_totale']); ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
