<?php
require_once("./controllers/visitorController.php");
require_once("./controllers/userController.php");
require_once("./controllers/Securite.php");
$visitorController = new visitorController();
$userController = new userController();




try {

    if (empty($_GET['page'])) {
        $page = "acceuil";
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $page = $url[0];
    }
    var_dump($page);
    switch ($page) {
        case "acceuil":
            $visitorController->accueil();
            break;
        case "authentification":
            $visitorController->authentification();
            break;
        case "inscription":
            $visitorController->inscription();
           break;

        case "profile":
            $visitorController->profile();
            break;
        case "contact":
            $visitorController->contact();
            break;
        case "floppy":
            $visitorController->floppy();
            break;

        case "authentifier":
            echo "testttttt";
            if(!empty($_POST["login"]) && !empty($_POST['password'])) {
                $login = Securite::secureHTML($_POST['login']);
                $password = Securite::secureHTML($_POST['password']);
                $userController->validation_login($login,$password);
            } else {
                echo "nooon";
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
