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
    function majprofil($ville,$desc,$login){
        ConnectionDB::majProfile($ville,$desc,$login);
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
    public function boutique(){
        $data_page = [
            "page_description"=>"page d'acceuil",
            "page_title" => "acceuil",
            "view"=> "./views/merch.php",
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
        $_SESSION['desc']=ConnectionDB::getDesc($_SESSION['login']);
        $_SESSION['ville']=ConnectionDB::getVille($_SESSION['login']);
        $data_page =[
            "page_description"=>"Page du profil",
            "page_title" => "profile",
            "view"=> "./views/profile.php",
            "template"=>"./views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function modifierprofil(){
        $data_page =[
            "page_description"=>"Page de la modification du profil",
            "page_title" => "profile",
            "view"=> "./views/profilemodif.php",
            "template"=>"./views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function messages(){
        $data_page =[
            "page_description"=>"Page de consultation de messages",
            "page_title" => "messages",
            "view"=> "./views/messages.php",
            "template"=>"./views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function envoiMSG(){
        //$datas = $this->mainManager->getDataX();
        $data_page = [
            "page_description"=>"page d'acceuil",
            "page_title" => "acceuil",
            "view"=> "./views/envoiMessage.php",
            "template"=>"./views/common/template.php"
        ];
        $this->genererPage($data_page);
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

    public function minesweeper(){
        $data_page =[
            "page_description"=>"un super jeu pour devenir gros",
            "page_title" => "snake",
            "view"=> "./views/minesweeper.php",
            "template"=>"./views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

}