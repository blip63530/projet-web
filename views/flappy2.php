<?php

include_once("./Controllers/Toolkit/ConnectionDB.php");
/*var_dump($_POST);
if(isset($_POST['action'])){
if ($_POST['action'] == "setscore") { setscore(1,$_POST['score']);}}
// Obtenez les données du jeu

var_dump($data);
//$gameModel->set_gamescore();

function setscore($uid,$score){
    echo "biteeee";
    ConnectionDB::set_gamescore($uid,$score);
} */
$data = ConnectionDB::getGameInfo(1);
?> 

<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../scripts/jquery-3.7.1.min.js"></script>
    <title>Flappy Bird using JS | by learnWD</title>
    <!-- Style sheets -->
    <link href="../css/flappy2.css" rel="stylesheet">
    <link href="../index.css" rel="stylesheet">
</head>

<body>
    <div class="jeux_score">


        <div class="page_flappy">
            <div class="score-container">
                <div id="bestScore"></div>
                <div id="currentScore"></div>
            </div>

            <canvas id="canvas" width="431" height="768"></canvas>

            <script src="../scripts/flappy2.js"></script>
        </div>
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



            <!--
    <p id="pscorres">scores</p>
      <table>
      <tbody id="tabscores">

      </tbody>
      </table>
-->

        </div>
    </div>
    <!--
  <script>
      document.addEventListener("DOMContentLoaded", () => {
          //call ajax
          var ajax = new XMLHttpRequest();
          var method = "GET";
          var url = "../models/inscription-files/scoresflappy.php";
          var asynchronous = true;
          ajax.open(method, url, asynchronous);
          //sending ajax request
          ajax.send();

          //receving response from data.php
          ajax.onreadystatechange = function () {

              if (this.readyState == 4 && this.status == 200) {

                  var data = JSON.parse(this.responseText);//converting json to array
                  console.log(data);
                  var html = "";
                  for (var a = 0; a < data.length; a++) {
                      var score = data[a].ScoreNb;
                      var nom = data[a].Pseudo;

                      //happending html
                      html += "<tr>";
                      html += "<td>" + score + "</td>";
                      html += "<td>" + nom + "</td>";
                      html += "</tr>";


                  }
                  //replacing tbody
                  document.getElementById("tabscores").innerHTML = html;
              }
          }
      });



  </script>
  -->
</body>

</html>