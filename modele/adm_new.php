<?php
// si on a pas le droit d'écrire un article
if($_SESSION['ecrit']==false){
    // redirection
    header("Location: ./");
}

// si on a envoyé pas envoyé le formulaire

if(empty($_POST)) {
    // on sélectionne tous les utilisateurs qui peuvent écrire un article
    $sql = "SELECT u.id,d.id, u.lelogin
FROM util u
    INNER JOIN droit d
    ON d.id = u.droit_id
    WHERE ecrit=1;";

    $recup_util = mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));

    $tab_util = mysqli_fetch_all($recup_util,MYSQLI_ASSOC);
    //var_dump($tab_util);

    // formulaire envoyé
}else{


    $letitre = htmlspecialchars(strip_tags(trim($_POST['letitre'])),ENT_QUOTES);
    $letexte = htmlspecialchars(strip_tags(trim($_POST['ladesc'])),ENT_QUOTES);
    $util_id= $_SESSION['idutil'];
    $rubrique=
    $date = $_POST['ladate'];

    $sql = "INSERT INTO article (letitre,ladesc,ladate,util_id)
            VALUES ('$letitre','$letexte','$date',$util_id)";
    // exécution de la requête
    mysqli_query($mysqli,$sql)or die(mysqli_error('r'.$mysqli));

    // récupération de l'id de l'article
    $idarticle = mysqli_insert_id($mysqli);

    $sql = "INSERT INTO article_has_rubrique (article_id, rubrique_id) VALUES ";
    foreach($_POST['auteur'] as $auteur){
        $sql .= "($idarticle,$letitre),";
    }
    $sql = substr($sql, 0, -1);

   // mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));

    // création de la variable pour afficher 'article inséré'
    $article_insere = "Votre article « $letitre » est inséré, merci! ";
}
