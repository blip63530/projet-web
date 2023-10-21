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

        public static function closeConnection($conn) {
            $conn->close();
        }

        public static function flappyboard($conn)
        {
            $result = mysqli_query($conn, 'SELECT Comptes.Name AS Pseudo, ScoreNb FROM Scores
        INNER JOIN Comptes ON Scores.UID=Comptes.UID
        INNER JOIN Jeu ON Scores.IDGAME = Jeu.IDGAME
        WHERE NomJeu = "flappy" ORDER BY ScoreNb DESC LIMIT 10;');
        }
        public static function inscrire($nom, $mail, $pw)
        {
            $conn = ConnectionDB::connectDB();
            $stmt = $conn->prepare("INSERT INTO Comptes(Name,Mail,PW) VALUES (?,?,?)");
            $stmt->bind_param("sss", $nom, $mail, $pw);
            $stmt->execute();
        }
        public static function connection($nom, $pw)
        {
            $validation = "noresult";
            $conn = ConnectionDB::connectDB();
            $stmt = mysqli_prepare($conn, "SELECT Name FROM Comptes WHERE PW=? AND Name=?");
            mysqli_stmt_bind_param($stmt, 'ss', $pw, $nom);

            /* execute query */
            mysqli_stmt_execute($stmt);

            /* bind result variables */
            mysqli_stmt_bind_result($stmt, $validation);

            /* fetch value */
            mysqli_stmt_fetch($stmt);
            if ($nom == $validation) {
                echo "ok connection";
                return (true);
            } else
                echo "not ok - identifiants non trouvés";
            return (false);
        }
        public static function connection2($nom, $pw)
        {
            $conn = ConnectionDB::connectDB();
            $result = mysqli_query($conn, "SELECT Name FROM Comptes WHERE PW=$pw AND Name=$nom");
            echo $nom;
            echo $result;
            if ($nom == $result) {
                echo "ok";
                return (true);
            } else
                echo "not ok";
            return (false);
        }

        public static function getGameInfo($gameId) {
            $gameQuery = "SELECT NomJeu FROM Jeu WHERE IDGAME = $gameId;";
            $conn = ConnectionDB::connectDB();
            $gameResult = $conn->query($gameQuery);
            $gameRow = $gameResult->fetch_assoc();
            $gameName = $gameRow ? $gameRow['NomJeu'] : ''; // Initialisez à une chaîne vide si aucune donnée n'est trouvée
    
            $scoresQuery = "SELECT c.Name, s.ScoreNb FROM Comptes c
                            INNER JOIN Scores s ON c.UID = s.UID
                            WHERE s.IDGAME = $gameId
                            ORDER BY s.ScoreNb DESC;";
            $scoresResult = $conn->query($scoresQuery);
            
            $scores = [];
            if ($scoresResult->num_rows > 0) {
                while ($row = $scoresResult->fetch_assoc()) {
                    $scores[] = [
                        'name' => $row['Name'],
                        'score' => $row['ScoreNb']
                    ];
                }
            }
    
            $data = [
                'gameName' => $gameName,
                'scores' => $scores
            ];
    
            return $data;
        }    
        public static function set_gamescore($game,$score){
            $conn = ConnectionDB::connectDB();
            $uid= 1 ;
            mysqli_query($conn,"UPDATE Scores
            SET ScoreNb=$score
            WHERE UID = $uid AND IDGAME=$game;");
        }
    }
