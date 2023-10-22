<?php
include_once("./Controllers/Toolkit/loginDB.php");
class ConnectionDB
{

    public static function connectDB()
    {
        global $servername, $DBusername, $DBpassword, $dbname;
        $conn = mysqli_connect($servername, $DBusername, $DBpassword, $dbname);


        return $conn;
    }

    public static function closeConnection($conn)
    {
        $conn->close();
    }

    public static function flappyboard($conn)
    {
        $result = mysqli_query($conn, 'SELECT Comptes.Name AS Pseudo, ScoreNb FROM Scores
        INNER JOIN Comptes ON Scores.UID=Comptes.UID
        INNER JOIN Jeu ON Scores.IDGAME = Jeu.IDGAME
        WHERE NomJeu = "flappy" ORDER BY ScoreNb DESC LIMIT 10;');
    }
    public static function getSalt($name)
    {
        $salt="";
        $conn = ConnectionDB::connectDB();
        /* Récupération du Salt */
        $stmt = mysqli_prepare($conn, "SELECT Salt FROM Comptes WHERE Name=?");
        mysqli_stmt_bind_param($stmt, 's', $name);
        /* execute query */
        mysqli_stmt_execute($stmt);

        /* bind result variables */
        mysqli_stmt_bind_result($stmt, $salt);
        mysqli_stmt_fetch($stmt);
        if ($salt == "") {
            echo "Aucun compte trouvé";
            return false;
        } else
        return $salt;
    }
    public static function inscrire($nom, $mail, $pw, $salt)
    {
        $conn = ConnectionDB::connectDB();

        $stmt = $conn->prepare("INSERT INTO Comptes(Name,Mail,PW,salt) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $nom, $mail, $pw, $salt);
        $stmt->execute();
    }
    public static function connection($nom, $pw)
    {
        $validation = "noresult";
        $salt = ConnectionDB::getSalt($nom);
        $conn = ConnectionDB::connectDB();

        $passwordhash = Securite::derivateKey($pw,$salt);
        $stmt = mysqli_prepare($conn, "SELECT Name FROM Comptes WHERE PW=? AND Name=?");
        mysqli_stmt_bind_param($stmt, 'ss', $passwordhash, $nom);
        /* execute query */
        mysqli_stmt_execute($stmt);

        /* bind result variables */
        mysqli_stmt_bind_result($stmt, $validation);

        /* fetch value */
        mysqli_stmt_fetch($stmt);
        


        if ($nom == $validation) {
            return (true);
        } else
            echo "not ok - Mot de passe invalide";
        return (false);
    }

    public static function getGameInfo($gameId)
    {
        $gameQuery = "SELECT NomJeu FROM Jeu WHERE IDGAME = $gameId;";
        $conn = ConnectionDB::connectDB();
        $gameResult = $conn->query($gameQuery);
        $gameRow = $gameResult->fetch_assoc();
        $gameName = $gameRow ? $gameRow['NomJeu'] : ''; // Initialisez à une chaîne vide si aucune donnée n'est trouvée

        $scoresQuery = "SELECT c.Name, s.ScoreNb, s.dateScore FROM Comptes c
                            INNER JOIN Scores s ON c.UID = s.UID
                            WHERE s.IDGAME = $gameId
                            ORDER BY s.ScoreNb DESC;";
        $scoresResult = $conn->query($scoresQuery);

        $scores = [];
        if ($scoresResult->num_rows > 0) {
            while ($row = $scoresResult->fetch_assoc()) {
                $scores[] = [
                    'name' => $row['Name'],
                    'score' => $row['ScoreNb'],
                    'date' => $row['dateScore']
                ];
            }
        }

        $data = [
            'gameName' => $gameName,
            'scores' => $scores
        ];

        return $data;
    }


    public static function set_gamescore($game)
    {
        switch ($game){
            case $game==1;
                if(!empty($_COOKIE['highscore']))
                $score=$_COOKIE['highscore'];
                else{
                    $score=0;
                }
                break;
                case $game==2;
                    if(!empty($_COOKIE['highscoresnake']))
                        $score=$_COOKIE['highscoresnake'];
                    else{
                        $score=0;
                    }
                    break;
        }
        if(!empty($_SESSION['uid'])) {
            $uid = $_SESSION['uid'];
            $conn = ConnectionDB::connectDB();

            $scoresQuery = "SELECT ScoreNb FROM Scores WHERE IDGAME = $game AND UID = $uid 
                            ORDER BY ScoreNb DESC
                            LIMIT 1;";
            $scoresResult = $conn->query($scoresQuery);
            $scoresResult = $scoresResult->fetch_array();
            if ($scoresResult[0] ==''){
                mysqli_query($conn, "INSERT INTO `Scores` (`IDGAME`, `UID`, `ScoreNb`) VALUES ($game, $uid, $score)");

            }
            else if($scoresResult[0]<$score){
                mysqli_query($conn, "INSERT INTO `Scores` (`IDGAME`, `UID`, `ScoreNb`) VALUES ($game, $uid, $score)");

            }


           // mysqli_query($conn, "INSERT INTO `Scores` (`IDGAME`, `UID`, `ScoreNb`) VALUES ($game, $uid, $score)");
        }
    }

    public static function getuid($login){
        $conn = ConnectionDB::connectDB();
        $stmt = mysqli_prepare($conn, "SELECT UID FROM Comptes WHERE Name=?");
        mysqli_stmt_bind_param($stmt, 's', $login);
        /* execute query */
        mysqli_stmt_execute($stmt);

        /* bind result variables */
        mysqli_stmt_bind_result($stmt, $uid);

        /* fetch value */
        mysqli_stmt_fetch($stmt);
        return $uid;
    }

    public static function getScoresJoueur($uid){
        $conn = ConnectionDB::connectDB();

        
        $query = "SELECT Jeu.NomJeu, Scores.ScoreNb, Scores.dateScore 
                  FROM Scores 
                  INNER JOIN Jeu ON Scores.IDGAME = Jeu.IDGAME 
                  WHERE Scores.UID = ? 
                  ORDER BY Scores.ScoreNb DESC";

        // Préparez la requête SQL avec l'ID du joueur
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $uid); // "s" signifie chaîne (string)

        // Exécutez la requête SQL
        $stmt->execute();

        // Récupérez les résultats de la requête
        $result = $stmt->get_result();

        // Initialisez un tableau pour stocker les données
        $scores = array();

        // Parcourez les résultats et stockez-les dans le tableau
        while ($row = $result->fetch_assoc()) {
            $scores[] = $row;
        }

        // Fermez la connexion à la base de données
        $stmt->close();
        $conn->close();

        // Retournez les scores du joueur
        return $scores;
    }
    public static function getDesc($login){
        $conn = ConnectionDB::connectDB();
        $stmt = mysqli_prepare($conn, "SELECT Description FROM Comptes WHERE Name=?");
        mysqli_stmt_bind_param($stmt, 's', $login);
        /* execute query */
        mysqli_stmt_execute($stmt);

        /* bind result variables */
        mysqli_stmt_bind_result($stmt, $desc);

        /* fetch value */
        mysqli_stmt_fetch($stmt);
        return $desc;
    }
    public static function getVille($login){
        $conn = ConnectionDB::connectDB();
        $stmt = mysqli_prepare($conn, "SELECT Ville FROM Comptes WHERE Name=?");
        mysqli_stmt_bind_param($stmt, 's', $login);
        /* execute query */
        mysqli_stmt_execute($stmt);

        /* bind result variables */
        mysqli_stmt_bind_result($stmt, $ville);

        /* fetch value */
        mysqli_stmt_fetch($stmt);
        return $ville;
    }
    public static function majProfile($ville,$desc,$login){
        $conn = ConnectionDB::connectDB();
        $stmt = mysqli_prepare($conn, "UPDATE Comptes SET Description=?, Ville=? WHERE Name=?");
        mysqli_stmt_bind_param($stmt, 'sss', $desc,$ville,$login);
        /* execute query */
        mysqli_stmt_execute($stmt);

    }
    public static function SendMessage($UIDSender,$UIDReceiver,$message){
        $conn = ConnectionDB::connectDB();
        $stmt = mysqli_prepare($conn, "INSERT INTO `Messages` (`UIDSender`, `UIDReceiver`, `Message`) VALUES (?,?,?)");
        mysqli_stmt_bind_param($stmt, 'sss', $UIDSender,$UIDReceiver,$message);
        /* execute query */
        mysqli_stmt_execute($stmt);
    }
    public static function GetMessages($UIDReceiver)
    {
        $conn = ConnectionDB::connectDB();
        $query = "SELECT Messages.Message, Messages.MID, Comptes.Name AS NomExpediteur 
                  FROM Messages 
                  INNER JOIN Comptes ON Messages.UIDSender = Comptes.UID 
                  WHERE Messages.UIDReceiver = ?";

        // Préparez la requête SQL avec l'ID du joueur
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $UIDReceiver); // "s" signifie chaîne (string)

        // Exécutez la requête SQL
        $stmt->execute();

        // Récupérez les résultats de la requête
        $result = $stmt->get_result();

        // Initialisez un tableau pour stocker les données
        $messages = array();

        // Parcourez les résultats et stockez-les dans le tableau
        while ($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }

        // Fermez la connexion à la base de données
        $stmt->close();
        $conn->close();

        // Retournez les scores du joueur
        return $messages;
    }

    public static function DeleteMessage($MID){
        $conn = ConnectionDB::connectDB();
        $stmt = mysqli_prepare($conn, "DELETE FROM `Messages` WHERE MID = ?");
        mysqli_stmt_bind_param($stmt, "i", $MID);
        /* execute query */
        mysqli_stmt_execute($stmt);

        $stmt->close();
        $conn->close();
    }
}
