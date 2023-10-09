<?php
require_once("./controllers/MainController.php");
require_once("./controllers/params/loginDB.php");
/*require_once("./models/Visiteur/utilisateurModel.php"); */
class userController extends MainController{
    function connectDB() {
        global $servername, $username, $password, $dbname;
    
        try {
            // Connexion à la base de données
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
            // Configuration de PDO pour générer des exceptions en cas d'erreur
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connexion à la base de données réussie. :) :) :) :) :) :) :)";
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
        $pdo = $this->connectDB();
        $sql = $pdo->prepare("INSERT INTO Comptes(Name,Mail,PW)
        VALUES (:nom,:mail,:pw)");
        $sql->bindParam(':pw',$pw);
        $sql->bindParam(':name',$nom);
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
        $pdo = $this->connectDB();
        $sql = $pdo->prepare("SELECT Name FROM Comptes() WHERE PW = :pw AND Name = :name");
        $sql->bindParam(':pw',$pw);
        $sql->bindParam(':name',$nom);
        $resultat = $pdo->exec($sql);
         var_dump($resultat);
        } catch(PDOException $e) {
             echo $sql . "<br>" . $e->getMessage();
        }
    
        $pdo=null;
    }

    public function validation_login($login,$password){
        echo "$login - $password";
        $this->connection($login,$password);
        
    }

}
?>