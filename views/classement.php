<?php
require_once 'loginDB.php';
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="index.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classement</title>


</head>

<body>
    <section id="classement">
        <?php
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Récupérer le nom du jeu
        $gameId = 1; // Remplacez 1 par l'ID du jeu que vous souhaitez afficher
        $gameQuery = "SELECT NomJeu FROM Jeu WHERE IDGAME = $gameId;";
        $gameResult = mysqli_query($conn, $gameQuery);
        $gameRow = mysqli_fetch_assoc($gameResult);
        $gameName = $gameRow['NomJeu'];

        // Affichez le nom du jeu
        echo "<div class='game-info'>
                <h1>$gameName</h1>
            </div>"; 

        // Récupérer les scores des joueurs
        $scoresQuery = "SELECT c.Name, s.ScoreNb FROM Comptes c
                    INNER JOIN Scores s ON c.UID = s.UID
                    WHERE s.IDGAME = $gameId
                    ORDER BY s.ScoreNb DESC;";
        $scoresResult = mysqli_query($conn, $scoresQuery);
        $resultCheck = mysqli_num_rows($scoresResult);

        if ($resultCheck > 0) {
            echo "<table border='1'>
                <tr>
                    <th>Nom du Joueur</th>
                    <th>Score</th>
                </tr>";

            while ($row = mysqli_fetch_assoc($scoresResult)) {
                echo "<tr>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['ScoreNb'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>Aucun score trouvé pour ce jeu.</p>";
        }

        mysqli_close($conn);
        ?>

    </section>
</body>

</html>