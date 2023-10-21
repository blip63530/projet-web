<?php
require_once("./Controllers/MainController.php");
require_once("./Controllers/Toolkit/ConnectionDB.php");
require_once("./Controllers/Toolkit/Securite.php");

/*require_once("./models/Visiteur/utilisateurModel.php"); */
class userController extends MainController{
   

    function validation_login($login,$pw){
        return(ConnectionDB::connection($login,$pw));
        
    }
    function inscrire($login,$pw,$email){
        [$salt,$hash] = Securite::HashKey($pw);
        echo $salt,$hash,$login,$email;
        ConnectionDB::inscrire($login,$email,$hash,$salt);
    }
    function creerUser($username){
        //TODO fonction pour creer le modele user dans ce controller et donc le stocker

    }

}
?>