<?php

class MainController{
    public function accueil(){
        $page_description = "";
        $page_title = "";
        ob_start();
        require_once("./views/accueil.php");
        $page_content = ob_get_clean();

    }
    
    public function authentification(){
        $page_description = "";
        $page_title = "";
        ob_start();
        require_once("./views/authentification.php");
        $page_content = ob_get_clean();
    }
    
    public function inscription(){
        $page_description = "";
        $page_title = "";
        $page_content = 
        ob_start();
        require_once("./views/inscription.php");
        $page_content = ob_get_clean();
    }
    
    public function profile(){
        $page_description = "";
        $page_title = "";
        ob_start();
        require_once("./views/profile.php");
        $page_content = ob_get_clean();
    }
}