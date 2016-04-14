<?php
// var_dump($_SESSION);

// accueil de l'admin
if(empty($_GET)){
    require_once "modele/adm_accueil.php";
    require_once "vue/adm_accueil.php";

// déconnexion
}elseif(isset($_GET['deconnect'])){
    require_once "modele/deco.php";
}

// nouvel article
elseif(isset($_GET['new'])){
    require_once "modele/adm_new.php";
    require_once "vue/adm_new.php";
}

// modification ou suppression d'article
elseif(isset($_GET['updel'])){
    require_once "modele/adm_updel.php";
    require_once "vue/adm_updel.php";
}

// suppression de l'article
elseif(isset($_GET['sup'])&& ctype_digit($_GET['sup'])){
    $idsup = (int) $_GET['sup'];
    require_once "modele/adm_sup.php";

}
elseif(isset($_GET['modif'])&& ctype_digit($_GET['modif'])){
    $idmodif = (int) $_GET['modif'];
    require_once "modele/adm_modif.php";
    require_once "vue/adm_modif.php";

}
