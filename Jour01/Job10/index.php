<?php

function bonjour($jour){
    if ($jour == true){
        echo "Bonjour";
    }
    else {
        echo "Bonsoir";
    }
}

bonjour(true);
bonjour(false);
?>