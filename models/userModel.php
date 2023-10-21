<?php

class UserModel {
    private $user;
    private $userid;

    public function __construct($user,$userid) {
        $username = $user ;
        $uid=$userid;

    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    
}


    

