<?php

class MainController{
    private function genererPage($data){
        extract($data);
        ob_start();
        require_once ($view);
        $page_content = ob_get_clean();
        require_once ($template);
    }
    public function accueil(){
        $data_page = [
            "page_description"=>"description de la page",
            "page_title" => "titre de la page",
            "view"=> "./views/acceuil.php",
            "template"=>"./views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function authentification(){
        $data_page = [
            "page_description"=>"description de la page",
            "page_title" => "titre de la page",
            "view"=> "./views/authentification.php",
            "template"=>"./views/common/template.php"
        ];
        $this->genererPage($data_page);
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