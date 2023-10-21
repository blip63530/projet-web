<?php

//include 'loginDB.php';
require_once '../../loginDB.php';
include '../gameModel.php';
include 'index.php';
/*
$conn=mysqli_connect($servername,$username,$password,$dbname);
// requete des score floppy
$result = mysqli_query($conn,'SELECT Comptes.Name AS Pseudo, ScoreNb FROM Scores
INNER JOIN Comptes ON Scores.UID=Comptes.UID
INNER JOIN Jeu ON Scores.IDGAME = Jeu.IDGAME
WHERE NomJeu = "Flappy Bird" ORDER BY ScoreNb DESC;');

$data = array();
while ($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}
// returning in form of json
echo json_encode($data);
*/
function seths($hs){
    echo $hs;


}
?>