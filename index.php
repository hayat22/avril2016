<?php



/*
 *
 * On est dans modeles/adm_modif.php !!!!!
 *
 *
 *
 *
 *
 */


// Lancement de la session
session_start();
require_once "config.php";
require_once "modele/db.php";

if (!isset($_SESSION["mamout"])|| $_SESSION["mamout"]!= session_id()) {
    require_once "controleur/Site.php";
}else{
    require_once "controleur/Admin.php";
}


