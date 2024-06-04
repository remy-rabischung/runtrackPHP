<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pseudo = $_POST["pseudo"];
        $mdp = $_POST["mdp"];

        if ($pseudo == "John" && $mdp == "Rambo") {
            echo "ce n'est pas ma guerre";
        } else {
            echo "votre pire cauchemar";
        }
    }
    ?>