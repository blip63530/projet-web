<?php
    require_once("./models/MainManager.php");
abstract class MainController{

    private $mainManager;
    protected function genererPage($data){
        extract($data);
        ob_start();
        require_once ($view);
        $page_content = ob_get_clean();
        require_once ($template);
        var_dump($data);
    }
    public function accueil(){
    /*    $datas = $this->mainManager->getDataX(); */
        $_SESSION['alert'] = [
            "message" => "message",
            "type" => "alert-danger"
        ];
        $data_page = [
            "page_description"=>"page d'acceuil",
            "page_title" => "acceuil",
            "view"=> "./views/acceuil.php",
        /*    "datas" => $datas, */
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


}
?>