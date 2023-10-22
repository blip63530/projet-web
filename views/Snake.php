<?php

include_once("./Controllers/Toolkit/ConnectionDB.php");
$data = ConnectionDB::getGameInfo(2);
ConnectionDB::set_gamescore(2);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="../scripts/jquery-3.7.1.min.js"></script>


  <title>Jeu Snake</title>
</head>


<body>
<div id="bestScore"></div>
<div class="snake" id ="snake">
<div is="canvasloc">

</div>


  <script src="../scripts/TrueSnake.js"></script>
  <div class="scoress">
    <section id="classement">
      <div class="game-info">
        <h1><?= $data['gameName'] ?></h1>
        <!-- L'image du jeu peut être ajoutée ici -->
        <!-- <img src="chemin/vers/votre/image.jpg" alt="Nom du Jeu"> -->
      </div>
      <?php if (count($data['scores']) > 0) : ?>
        <table border='1'>
          <tr>
            <th>Nom du Joueur</th>
            <th>Score</th>
          </tr>
          <?php foreach ($data['scores'] as $score) : ?>
            <tr>
              <td><?= $score['name'] ?></td>
              <td><?= $score['score'] ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      <?php else : ?>
        <p>Aucun score trouvé pour ce jeu.</p>
      <?php endif; ?>
    </section>


</div>

</body>

</html>