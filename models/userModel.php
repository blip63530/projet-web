<?php

class UserModel {
    private $username;
    public function __construct($user) {
        $username = $user ;
    }
    public function getUsername(){
        return $this->username;
    }



    
}


    

