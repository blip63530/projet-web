<?php
require_once("./controllers/MainController.php");
class visitorController extends MainController{
    
    private $mainManager;
    public function __construct(){
        $this->mainManager = new visitorModel();
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
    public function inscription(){
        $data_page =[
            "page_description"=>"Page d'inscription",
            "page_title" => "inscription",
            "view"=> "./views/inscription.php",
            "template"=>"./views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function floppy(){
        $data_page =[
            "page_description"=>"un super jeu pour devenir fou",
            "page_title" => "floppy bird",
            "view"=> "./views/floppy.php",
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
    public function accueil(){
       /* $datas = $this->mainManager->getDataX();  */
        $data_page = [
            "page_description"=>"page d'acceuil",
            "page_title" => "acceuil",
            "view"=> "./views/acceuil.php",
            /*"datas" => $datas,*/
            "template"=>"./views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
}