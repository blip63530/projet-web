<!DOCTYPE html>
<html>
  <head>
    <title>Flappy Bird using JS | by learnWD</title>
      <!-- Style sheets -->
      <link href="../css/flappy2.css" rel="stylesheet">
      <link href="../index.css" rel ="stylesheet">
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
    <p id="pscorres">scores</p>
      <table>
      <tbody id="tabscores">

      </tbody>
      </table>


  </div>
  </div>

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
  </body>

</html>