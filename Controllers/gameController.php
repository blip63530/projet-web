<?php
require_once("./Controllers/Toolkit/ConnectionDB.php");
class GameController {
    

    public function __construct() {

    }

    public function getGameInfo() {
        $gameId = 1; // Remplacez 1 par l'ID du jeu que vous souhaitez afficher
        return ConnectionDB::getGameInfo($gameId);
    }

    public function getGameInfoid($gameId) {
        //$gameId = 1; // Remplacez 1 par l'ID du jeu que vous souhaitez afficher
        return ConnectionDB::getGameInfo($gameId);
    }


    public function getScoresInfo() {
        $uid = $_SESSION['uid'];
        return ConnectionDB::getScoresJoueur($uid);
    }



}

