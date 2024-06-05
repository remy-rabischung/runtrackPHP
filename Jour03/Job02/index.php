<?php

function bonjour(bool $jour): string{
if ($jour == true){
    return "Bonjour";
}else{
    return "Bonsoir";
}}

echo (bonjour(false));

?>