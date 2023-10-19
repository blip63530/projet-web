<?php

class UserModel {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("82.65.68.131", "prod", "joTTjXTIJ3CI2ade", "projet-web");
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

    }

    public function inscrire($nom, $mail, $pw) {
        // Sanitize and hash the password
        $nom = filter_var($nom, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
        $pw = password_hash($pw, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare("INSERT INTO Comptes(Name, Mail, PW) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nom, $mail, $pw);

        if ($stmt->execute()) {
            // Success: user registered successfully
            $stmt->close();
            return true;
        } else {
            // Failure: handle the error
            error_log("Registration error: " . $stmt->error);
            $stmt->close();
            return false;
        }
    }

    
}


    

