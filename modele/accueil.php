<?php
$sql = "SELECT a.id, a.letitre,a.ladate,u.id, SUBSTRING(a.ladesc,1 ,200)AS ladesc, a.ladate
       FROM article a
       INNER JOIN article_has_rubrique rha
        ON a.id = rha.article_id

       INNER JOIN rubrique r
        ON r.id = rha.rubrique_id

        LEFT JOIN util u
        ON a.id = a.util_id
        GROUP BY a.id
        ORDER BY a.id DESC
       ";
$req_article = mysqli_query($mysqli, $sql)or die(mysqli_error ($mysqli));

$tab_article = mysqli_fetch_all($req_article, MYSQLI_ASSOC);
//var_dump($tab_article);

$nb = mysqli_num_rows($req_article);
