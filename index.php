<?php
require_once("./models/gameModel.php");
require_once("./Controllers/gameController.php");
require_once("./Controllers/Toolkit/Securite.php");
require_once("./Controllers/userController.php");
require_once("./Controllers/visitorController.php");
require_once("./models/userModel.php");
$mainController = new userController();
session_start();


try {
    
    if (empty($_GET['page'])) {
        $page = "acceuil";
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $page = $url[0];
    }

    switch ($page) {
        case "acceuil":
            $mainController->accueil();
            break;
        case "authentification":
            $mainController->authentification();
            break;
        case "inscription":
            $mainController->inscription();
            break;

        case "profile":
            $mainController->profile();
            break;
        case "contact":
            $mainController->contact();
            break;
        case "floppy":
            $mainController->floppy();
            break;
        case "snake":
            $mainController->snake();
            break;
        case "classement":
            $mainController->classement();
            break;
        case "authentifier":
            if (!empty($_POST["login"]) && !empty($_POST['password'])) {
                $login = Securite::secureHTML($_POST['login']);
                $password = Securite::secureHTML($_POST['password']);
                if (($user = $mainController->validation_login($login, $password)) != null) {
                    //$mainController = new userController($login); 
                    $mainController->creerUser($login);
                    $mainController->accueil();
                    
                }
            } else {
                echo "identifiants non complets";
                /*Toolbox::ajouterMessageAlerte("Login ou mot de passe non renseigné", Toolbox::COULEUR_ROUGE);
                    header('Location: '.URL."login");*/
            }
            break;
        case "inscrire":
            //echo $_POST["login"], $_POST["password"], $_POST["passwordcheck"], $_POST["email"];
            if (!empty($_POST["login"]) && !empty($_POST['password']) && !empty($_POST['passwordcheck'] && !empty($_POST['email']) && ($_POST['passwordcheck']==$_POST['password']))) {

                $login = Securite::secureHTML($_POST['login']);
                $password = Securite::secureHTML($_POST['password']);
                $email =Securite::secureHTML($_POST['email']);
                $passwordcheck=Securite::secureHTML($_POST['passwordcheck']);
                $userController->inscrire($login,$password,$email);
                $mainController->authentification();
            } else {
                echo "identifiants non complets";
                /*Toolbox::ajouterMessageAlerte("Login ou mot de passe non renseigné", Toolbox::COULEUR_ROUGE);
                        header('Location: '.URL."login");*/
            }
            break;
        default:
            throw new Exception("la page n'existe pas");
    }
} catch (Exception $e) {
    $page_description = "page de generation d'erreur";
    $page_title = "page d'erreur";
    $page_content = $e->getMessage();
}

/*$page_description = "description de la page";
$page_title="titre de la page";
$page_content="";*/

require_once("views/common/template.php");
