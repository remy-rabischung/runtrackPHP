<?php
session_start();

if (isset($_POST['reset'])) {
    // Réinitialise la liste des prénoms
    unset($_SESSION['names']);
} else if (isset($_POST['name']) && !empty($_POST['name'])) {
    // Ajoute le prénom à la session
    $name = htmlspecialchars($_POST['name']); // Sécurise l'entrée utilisateur
    if (!isset($_SESSION['names'])) {
        $_SESSION['names'] = [];
    }
    $_SESSION['names'][] = $name;
}

// Redirige vers la page principale après traitement
header("Location: index.php");
exit();
?>
