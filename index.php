<?php
require_once ("./controllers/MainController.php");
$mainController = new MainController();




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
        default :
            throw new Exeption("la page n'existe pas");
    }
} catch (Exeption $e){
    $page_description="page de generation d'erreur";
    $page_title = "page d'erreur";
    $page_content = $e->getMessage();
}

/*$page_description = "description de la page";
$page_title="titre de la page";
$page_content="";*/

require_once ("views/common/template.php");

