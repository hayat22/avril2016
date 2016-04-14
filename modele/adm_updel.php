<?php
//var_dump($_SESSION);
// si on peut rien faire
if (!($_SESSION['modifie_tous'] || $_SESSION['modifie'] || $_SESSION['sup_tous'] || $_SESSION['sup'])) {
    header("Location: ./");

// si on peut modifier ou supprimer les articles de tout le monde
} elseif ($_SESSION['modifie_tous'] || $_SESSION['sup_tous']) {
    $where = "";
// si on peut modifier ou supprimer ses articles
} else {
    // pour sélectionner que les articles de l'utilisateur
    $idutil = $_SESSION['idutil'];
    $where = "WHERE h.utilisateur_id = $idutil";
}


$sql = "SELECT a.id, a.letitre,
              (SELECT GROUP_CONCAT(u.lelogin SEPARATOR '|||') AS login
                FROM util u
                INNER JOIN article_has_rubrique rha
                ON u.id = rha.rubrique_id

                WHERE a.id = rha.article_id
        ) AS lelogin  ,
        SUBSTRING(a.ladesc,1 ,300)AS ladesc, a.ladate
       FROM article a
       INNER JOIN article_has_rubrique h
       ON a.id = h.article_id
       INNER JOIN util u
       ON u.id = h.article_id

        $where
        GROUP BY a.id
        ORDER BY a.id DESC
       ";
$req_article = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

$tab_article = mysqli_fetch_all($req_article, MYSQLI_ASSOC);
//var_dump($tab_article);

$nb = mysqli_num_rows($req_article);
