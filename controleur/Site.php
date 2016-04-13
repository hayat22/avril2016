<?php
// affichage de l'accueil
if (empty($_GET)) {
    require_once "modele/accueil.php";
    require_once "vue/accueil.php";

// si on veut lire un article en entier
} elseif (isset($_GET['idarticle']) && ctype_digit($_GET['idarticle'])) {
    $idarticle = (int) $_GET['idarticle'];
    require_once "modele/detail.php";
    require_once "vue/detail.php";

// si on veut se connecter
} elseif (isset($_GET['connect'])){
    require_once "modele/connect.php";
    require_once "vue/connect.php";
}


