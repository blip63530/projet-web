<?php

//include 'loginDB.php';
require_once '../../loginDB.php';
echo('1');
//coonection mysqli
$conn=mysqli_connect($servername,$username,$password,$dbname);
echo('2');
// requete des score floppy
$result = mysqli_query($conn,'SELECT Comptes.Name AS Pseudo, ScoreNb FROM Scores
INNER JOIN Comptes ON Scores.UID=Comptes.UID
INNER JOIN Jeu ON Scores.IDGAME = Jeu.IDGAME
WHERE NomJeu = "flappy" ORDER BY ScoreNb DESC LIMIT 10;');
echo('3');
$data = array();
while ($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}
echo('4');
// returning in form of json
echo json_encode($data);
echo('5');
?>