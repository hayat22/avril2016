<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
<h1>Accueil</h1><?php
include 'vue/menusite.php';
if($nb == 0){
    echo "Pas encore d'articles";
}else {
    foreach ($tab_article AS $tab) {


        echo "<h2>".$tab['letitre'] . " par ";
        echo "Le ".$tab['ladate'] . "</br>";
        echo $tab['ladesc'] . " <a href='?idarticle=".$tab['id']."'>... Lire la suite</a><hr/>";


    }
}?>
</body>
</html>
