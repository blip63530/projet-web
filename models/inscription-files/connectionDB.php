<?php
// Fichier de configuration contenant les informations de connexion
//include 'loginDB.php';
require_once '../../loginDB.php';
function connectDB() {
    global $servername, $username, $password, $dbname;

    try {
        // Connexion à la base de données
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Configuration de PDO pour générer des exceptions en cas d'erreur
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connexion à la base de données réussie. :) :) :) :) :) :) :)";
        return $pdo;
    } catch (PDOException $e) {
        // En cas d'erreur de connexion, affichez le message d'erreur
        echo "NOOOOOT CONNEECTEEEED :( :( :( :( :( :( ";
        die("Erreur de connexion : " . $e->getMessage());
    }
}

function inscription($nom,$mail,$pw)
{
    try {
    $pdo = connectDB();
    $sql = $pdo->prepare("INSERT INTO Comptes(Name,Mail,PW)
    VALUES (:nom,:mail,:pw)");
    $sql->bindParam(':pw',$pw);
    $sql->bindParam(':name',$name);
    $sql->bindParam(':mail',$mail);
    $pdo->exec($sql);
     echo "New record created successfully";
    } catch(PDOException $e) {
         echo $sql . "<br>" . $e->getMessage();
    }

    $pdo=null;
}
function connection($nom, $pw)
{
    try{
    $pdo = connectDB();
    $sql = $pdo->prepare("SELECT * FROM Comptes() WHERE PW = :pw AND Name = :name");
    $sql->bindParam(':pw',$pw);
    $sql->bindParam(':name',$name);
    $pdo->exec($sql);
     echo "New record created successfully";
    } catch(PDOException $e) {
         echo $sql . "<br>" . $e->getMessage();
    }

    $pdo=null;
}

// Appel de la fonction de connexion
$pdo = connectDB();

// Vous pouvez maintenant utiliser $pdo pour exécuter des requêtes SQL
// Par exemple : $pdo->query("SELECT * FROM ma_table");


/*
//coonection mysqli
$conn=mysqli_connect($servername,$username,$password,$dbname);
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

*/







// Fermez la connexion lorsque vous avez terminé
$pdo = null;
?>