<?php

//include 'loginDB.php';
require_once '../../loginDB.php';


//coonection mysqli
try {
    $conn = mysqli_connect($servername, $username, $password, $dbname, $db_port);
}
catch (Exception $e){
    $error = $e->getMessage();
    echo $error;
}
echo $conn->host_info . "\n";
// requete des score floppy
$result = mysqli_query($conn,'SELECT Comptes.Name AS Pseudo, ScoreNb FROM Scores
INNER JOIN Comptes ON Scores.UID=Comptes.UID
INNER JOIN Jeu ON Scores.IDGAME = Jeu.IDGAME
WHERE NomJeu = "flappy" ORDER BY ScoreNb DESC LIMIT 10;');

$data = array();
while ($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}
// returning in form of json
echo json_encode($data);
//echo('5');
?>