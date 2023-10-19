<?php
require_once("./controllers/MainController.php");
require_once("./loginDB.php");

/*require_once("./models/Visiteur/utilisateurModel.php"); */
class userController extends MainController{


    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function inscrire($nom, $mail, $pw) {
        return $this->model->incrire($nom, $mail, $pw);
    }



    function connectDB()
    {
        global $servername, $DBusername, $DBpassword, $dbname;
        $conn = mysqli_connect($servername, $DBusername, $DBpassword, $dbname);
        

        return $conn;
    }

    function flappyboard($conn) {
        $result = mysqli_query($conn, 'SELECT Comptes.Name AS Pseudo, ScoreNb FROM Scores
        INNER JOIN Comptes ON Scores.UID=Comptes.UID
        INNER JOIN Jeu ON Scores.IDGAME = Jeu.IDGAME
        WHERE NomJeu = "flappy" ORDER BY ScoreNb DESC LIMIT 10;');
    }
    //function inscrire($nom,$mail,$pw)
    //{
    //    $conn=$this->connectDB();
    //    $stmt = $conn->prepare("INSERT INTO Comptes(Name,Mail,PW) VALUES (?,?,?)");
    //    $stmt->bind_param("sss",$nom,$mail,$pw);
    //    $stmt->execute();
    //}
    function connection($nom, $pw)
    {
        $validation = "noresult";
        $conn = $this->connectDB();
        $stmt = mysqli_prepare($conn,"SELECT Name FROM Comptes WHERE PW=? AND Name=?");
        mysqli_stmt_bind_param($stmt,'ss',$pw,$nom);

        /* execute query */
        mysqli_stmt_execute($stmt);

        /* bind result variables */
        mysqli_stmt_bind_result($stmt, $validation);

        /* fetch value */
        mysqli_stmt_fetch($stmt);
        if($nom == $validation) {
            echo "ok connection";
            return(true);
        } else 
        echo "not ok - identifiants non trouvés";
        return(false);

    }
    function connection2($nom,$pw){
        $conn = $this->connectDB();
        $result = mysqli_query($conn,"SELECT Name FROM Comptes WHERE PW=$pw AND Name=$nom");
        echo $nom;
        echo $result;
        if($nom == $result) {
            echo "ok";
            return(true);
        } else 
        echo "not ok";
        return(false);
    }

    function validation_login($login,$pw){
        return($this->connection($login,$pw));
        
    }

}
?>