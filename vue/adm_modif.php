<html>
<head>
  <meta charset="UTF-8">
  <title>Modification</title>
</head>
<body>
<h1>Modification</h1>
<h2>Bienvenue <?=$_SESSION['lelogin']?></h2>
<?php
require "vue/menu.inc.php";


if(isset($article_modif)){
  echo "<h3>$article_modif</h3>";
}else{
?>
<form method="post" action="" name="lulu">
  <input type="text" name="letitre" placeholder="Votre titre" value="<?=$tab['letitre']?>" required/><br/>
  <input type="datetime" name="ladate" value="<?=$tab['ladate']?>" required/><br/>
  <textarea name="letexte"  required placeholder="Votre texte"><?=$tab['texte']?></textarea><br/>
  <?php

  foreach ($tab_util as $val) {
    if ($_SESSION['idutil'] == $val['droit_id']) {
      ?>
      <input type="checkbox" checked disabled/>
      <?= $val['lelogin'] ?>    <input name="auteur[]" type="hidden" value='<?= $val['droit_id'] ?>'/> |

      <?php
    } else {
      //var_dump($val['lelogin']);
      $is_checked = "checked";

      ?>
      <?= $val['lelogin'] ?>  <input name="auteur[]" type="checkbox" value='<?= $val['droit_id'] ?>'/> |

      <?php
    }
  }
  echo '<input type="submit" value="Envoyer" /><br/>';
  }
  ?>

</form>
</body>
</html>
