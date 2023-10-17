<?php
require_once("./controllers/MainController.php");
require_once("./loginDB.php");
/*require_once("./models/Visiteur/utilisateurModel.php"); */
class userController extends MainController{
    function connectDB()
    {
        global $servername, $username, $password, $dbname;
        echo $username;
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        

        return $conn;
    }

    function flappyboard($conn) {
        $result = mysqli_query($conn, 'SELECT Comptes.Name AS Pseudo, ScoreNb FROM Scores
        INNER JOIN Comptes ON Scores.UID=Comptes.UID
        INNER JOIN Jeu ON Scores.IDGAME = Jeu.IDGAME
        WHERE NomJeu = "flappy" ORDER BY ScoreNb DESC LIMIT 10;');
    }
    function inscrire($nom,$mail,$pw)
    {
        $conn=$this->connectDB();
        $stmt = $conn->prepare("INSERT INTO Comptes(Name,Mail,PW) VALUES (?,?,?)");
        $stmt->bind_param("sss",$nom,$mail,$pw);
        $stmt->execute();
    }
    function connection($nom, $pw)
    {
        $validation = "";
        $conn = $this->connectDB();
        $stmt = $conn->prepare("SELECT Name FROM Comptes WHERE PW=? AND Name=?");
        $stmt->bind_param("ss",$nom,$pw);
        $stmt->execute();
        $stmt->bind_result($validation);
        $stmt->fetch();
        if($nom == $validation) {
            return(true);
        } else return(false);

    }

    function validation_login($login,$password){
        echo "$login - $password";
        $this->connection($login,$password);
        
    }

}
?>