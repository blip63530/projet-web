<?php
    require_once("./models/MainManager.php");
class MainController{
    //private $mainManager;
    public function __construct(){
    }
private $template = "./views/common/template.php";
    protected function genererPage($data){
        extract($data);
        ob_start();
        require_once ($view);
        $page_content = ob_get_clean();

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
        $data_page =[
            "page_description"=>"Page d'inscription",
            "page_title" => "inscription",
            "view"=> "./views/inscription.php",
            "template"=>"./views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    function validation_login($login,$pw){
        if($reponse=ConnectionDB::connection($login,$pw)){
            $_SESSION['profil']=[
                "login"=>$login,
            ];
        }
        return($reponse);
    }
    function inscrire($login,$pw,$email){
        [$salt,$hash] = Securite::HashKey($pw);
        echo $salt,$hash,$login,$email;
        ConnectionDB::inscrire($login,$email,$hash,$salt);
    }


    

    public function accueil(){
        //$datas = $this->mainManager->getDataX();
        $data_page = [
            "page_description"=>"page d'acceuil",
            "page_title" => "acceuil",
            "view"=> "./views/acceuil.php",
            "template"=>"./views/common/template.php"
        ];
        $this->genererPage($data_page);
    }


    public function floppy(){
        $data_page =[
            "page_description"=>"un super jeu pour devenir fou",
            "page_title" => "floppy bird",
            "view"=> "./views/flappy2.php",
            "template"=>"./views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
    

    
    public function profile(){
        $data_page =[
            "page_description"=>"Page du profil",
            "page_title" => "profile",
            "view"=> "./views/profile.php",
            "template"=>"./views/common/template.php"
        ];
    }

    public function contact(){
        $data_page = [
            "page_description"=>"page de contact",
            "page_title" => "contact",
            "view"=> "./views/contact.php",
            "template"=>"./views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function classement(){
        $data_page = [
            "page_description"=>"page de classement",
            "page_title" => "classement",
            "view"=> "./views/classement.php",
            "template"=>"./views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function snake(){
        $data_page =[
            "page_description"=>"un super jeu pour devenir gros",
            "page_title" => "snake",
            "view"=> "./views/Snake.php",
            "template"=>"./views/common/template.php"
        ];
        $this->genererPage($data_page);
    }


}