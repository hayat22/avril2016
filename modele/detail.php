<?php
$sql = "SELECT a.id, a.ladesc,
GROUP_CONCAT(u.lelogin SEPARATOR '|||' )AS login, a.ladesc, a.ladate, a.letitre
       FROM article a
       INNER JOIN article_has_rubrique rha
       ON a.id = rha.article_id
       INNER JOIN util u
         ON a.id = a.util_id
        WHERE a.id = $idarticle

       ";
$req_article = mysqli_query($mysqli, $sql)or die(mysqli_error ($mysqli));

$tab_article = mysqli_fetch_assoc($req_article);
//var_dump($tab_article);
if(empty($tab_article['id'])){
     $erreur = "Cet article n'existe plus";
}