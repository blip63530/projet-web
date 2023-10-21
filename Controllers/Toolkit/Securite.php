<?php

class Securite{
    public static function secureHTML($chaine){
        return htmlentities($chaine);
    }
    public static function generateSalt(){

        return bin2hex(random_bytes(32));

    }
    
    public static function derivateKey($password, $salt)
    {
        $iterations = 600000;
        $keyLengthBits = 32;
        $hash = bin2hex(hash_pbkdf2('sha256',$password,$salt,$iterations,$keyLengthBits / 8,true));
        
        return $hash;
    
    }
    public static function HashKey($password){
        $salt = Securite::generateSalt();
        $hash = Securite::derivateKey($password,$salt);
        return [$salt,$hash];
    }
    }
?>