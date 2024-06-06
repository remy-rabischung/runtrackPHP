<?php

if (isset($_POST['reset'])) {
    setcookie('nbVisites', 0, time() + 365*24*3600);
    $_COOKIE['nbVisites'] = 0; 
} else {
    if (isset($_COOKIE['nbVisites'])) {
        $nbVisites = $_COOKIE['nbVisites'] + 1;
    } else {
        $nbVisites = 1;
    }
    setcookie('nbVisites', $nbVisites, time() + 365*24*3600);
    $_COOKIE['nbVisites'] = $nbVisites; 
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Compteur de visites</title>
</head>
<body>
    <h1>Nombre de visites : <?php echo isset($_COOKIE['nbVisites']) ? $_COOKIE['nbVisites'] : 0; ?></h1>
    <form method="post">
        <button type="submit" name="reset">Reset</button>
    </form>
</body>
</html>
