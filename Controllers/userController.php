<?php
require_once("./Controllers/MainController.php");
require_once("./Controllers/Toolkit/ConnectionDB.php");
require_once("./Controllers/Toolkit/Securite.php");
require_once("./models/userModel.php");
class userController extends MainController{
    private $usermodel;
    public function __construct(){
        //$this->usermodel = new userModel($name);
    }


    function creerUser($username){
        $this->usermodel = new UserModel($username);
    }  
    protected function genererPage($data){
        //echo "connected";
        extract($data);
        ob_start();
        require_once ($view);
        $page_content = ob_get_clean();
        //require_once ("./views/common/connected/template.php"); 
        require_once ($template);

    
    }
    function getUser(){
        return $this->usermodel;
    }

}
?>