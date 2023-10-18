

<?php
require_once("./models/gameModel.php");
require_once("./Controllers/gameController.php");
require_once("./Controllers/Securite.php");
require_once("./Controllers/MainController.php");
require_once("./Controllers/userController.php");
$mainController = new MainController();
$userController = new userController();




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
        case "classement":
            $mainController->classement();
            break;
        case "authentifier":
            if (!empty($_POST["login"]) && !empty($_POST['password'])) {

                $login = Securite::secureHTML($_POST['login']);
                $password = Securite::secureHTML($_POST['password']);
                echo $userController->validation_login($login, $password);
            } else {
                echo "identifiants non complets";
                /*Toolbox::ajouterMessageAlerte("Login ou mot de passe non renseigné", Toolbox::COULEUR_ROUGE);
                    header('Location: '.URL."login");*/
            }
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
