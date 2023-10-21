<?php

class GameController {

    private $model;

    public function __construct() {
        $this->model = new GameModel();
    }

    public function getGameInfo() {
        $gameId = 1; // Remplacez 1 par l'ID du jeu que vous souhaitez afficher
        return $this->model->getGameInfo($gameId);
    }



}

