<?php
session_start();

// Fonction pour initialiser la grille
function initialize_grid() {
    return array_fill(0, 3, array_fill(0, 3, '-'));
}

// Réinitialisation de la partie
if (isset($_POST['reset'])) {
    $_SESSION['grid'] = initialize_grid();
    $_SESSION['current_player'] = 'X';
    $_SESSION['message'] = '';
}

// Initialisation de la grille au démarrage
if (!isset($_SESSION['grid'])) {
    $_SESSION['grid'] = initialize_grid();
    $_SESSION['current_player'] = 'X';
    $_SESSION['message'] = '';
}

// Traitement du coup joué
if (isset($_POST['cell'])) {
    $cell = explode(',', $_POST['cell']);
    $row = (int)$cell[0];
    $col = (int)$cell[1];

    // Si la case est vide, effectuez le coup
    if ($_SESSION['grid'][$row][$col] === '-') {
        $_SESSION['grid'][$row][$col] = $_SESSION['current_player'];
        
        // Vérifie si le joueur actuel a gagné
        if (check_winner($_SESSION['grid'], $_SESSION['current_player'])) {
            $_SESSION['message'] = $_SESSION['current_player'] . ' a gagné !';
            $_SESSION['grid'] = initialize_grid(); // Réinitialise la grille
            $_SESSION['current_player'] = 'X'; // X commence toujours
        } else if (is_draw($_SESSION['grid'])) {
            $_SESSION['message'] = 'Match nul !';
            $_SESSION['grid'] = initialize_grid(); // Réinitialise la grille
            $_SESSION['current_player'] = 'X'; // X commence toujours
        } else {
            // Change de joueur
            $_SESSION['current_player'] = ($_SESSION['current_player'] === 'X') ? 'O' : 'X';
        }
    }
}

// Fonction pour vérifier si un joueur a gagné
function check_winner($grid, $player) {
    // Vérifie les lignes, colonnes et diagonales
    for ($i = 0; $i < 3; $i++) {
        if ($grid[$i][0] === $player && $grid[$i][1] === $player && $grid[$i][2] === $player) {
            return true;
        }
        if ($grid[0][$i] === $player && $grid[1][$i] === $player && $grid[2][$i] === $player) {
            return true;
        }
    }
    if ($grid[0][0] === $player && $grid[1][1] === $player && $grid[2][2] === $player) {
        return true;
    }
    if ($grid[0][2] === $player && $grid[1][1] === $player && $grid[2][0] === $player) {
        return true;
    }
    return false;
}

// Fonction pour vérifier s'il y a match nul
function is_draw($grid) {
    foreach ($grid as $row) {
        if (in_array('-', $row)) {
            return false;
        }
    }
    return true;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu du Morpion</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            width: 50px;
            height: 50px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid #000;
        }
        form {
            display: inline;
        }
    </style>
</head>
<body>
    <h1>Jeu du Morpion</h1>
    <p><?php echo $_SESSION['message']; ?></p>
    <table>
        <?php for ($i = 0; $i < 3; $i++): ?>
            <tr>
                <?php for ($j = 0; $j < 3; $j++): ?>
                    <td>
                        <?php if ($_SESSION['grid'][$i][$j] === '-'): ?>
                            <form method="post">
                                <input type="hidden" name="cell" value="<?php echo $i . ',' . $j; ?>">
                                <button type="submit"><?php echo $_SESSION['grid'][$i][$j]; ?></button>
                            </form>
                        <?php else: ?>
                            <?php echo $_SESSION['grid'][$i][$j]; ?>
                        <?php endif; ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
    <form method="post">
        <button type="submit" name="reset">Réinitialiser la partie</button>
    </form>
</body>
</html>
