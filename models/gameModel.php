<?php

class GameModel {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("82.65.68.131", "prod", "joTTjXTIJ3CI2ade", "projet-web");
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

    }

    public function getGameInfo($gameId) {
        $gameQuery = "SELECT NomJeu FROM Jeu WHERE IDGAME = $gameId;";
        $gameResult = $this->conn->query($gameQuery);
        $gameRow = $gameResult->fetch_assoc();
        $gameName = $gameRow ? $gameRow['NomJeu'] : ''; // Initialisez à une chaîne vide si aucune donnée n'est trouvée

        $scoresQuery = "SELECT c.Name, s.ScoreNb FROM Comptes c
                        INNER JOIN Scores s ON c.UID = s.UID
                        WHERE s.IDGAME = $gameId
                        ORDER BY s.ScoreNb DESC;";
        $scoresResult = $this->conn->query($scoresQuery);
        
        $scores = [];
        if ($scoresResult->num_rows > 0) {
            while ($row = $scoresResult->fetch_assoc()) {
                $scores[] = [
                    'name' => $row['Name'],
                    'score' => $row['ScoreNb']
                ];
            }
        }

        $data = [
            'gameName' => $gameName,
            'scores' => $scores
        ];

        return $data;
    }

    public function closeConnection() {
        $this->conn->close();
    }

    
}



