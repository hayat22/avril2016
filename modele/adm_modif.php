<?php

// formulaire envoyé
if(!empty($_POST)){
  extract($_POST,EXTR_PREFIX_ALL, "rrr");
  var_dump($GLOBALS);
}




if($_SESSION['modifie_tous']=="1"){
  $concat="";
}elseif ($_SESSION['modifie']=="1"){
  $idutil = $_SESSION['idutil'];
  // et que l'utilisateur fait partie des auteurs de l'article
  $concat = "AND (SELECT COUNT(*) FROM article_has_rubrique h WHERE h.article_id = $idmodif AND h.util_id = $idutil) = 1";
}else{
  header("Location: ./");
  exit();
}

$sql = "
SELECT a.*, GROUP_CONCAT(u.id) as idutil,
            GROUP_CONCAT(u.lelogin SEPARATOR '|||') as lelogin 
            FROM article a 
  INNER JOIN article_has_rubrique h
  ON a.id = h.article_id
  INNER JOIN util u

WHERE a.id = $idmodif
 $concat
 GROUP BY a.id;
       ";
$req_article = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

$tab = mysqli_fetch_assoc($req_article);

$sql = "SELECT droit_id, lelogin FROM util
   INNER JOIN droit
    ON droit.id = util.droit_id
    WHERE ecrit=1;";


$recup_util = mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));

$tab_util = mysqli_fetch_all($recup_util,MYSQLI_ASSOC);

// on est là