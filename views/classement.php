<?php
    
    $gameController = new GameController();

    // Obtenez les données du jeu
    $data = $gameController->getGameInfo();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Classement</title>
</head>
<body>
    <section id="classement">

        <?php  $data = $gameController->getGameInfoid(1); ?>
        <div class="game-info">
            <h1><?= $data['gameName'] ?></h1>
            <!-- L'image du jeu peut être ajoutée ici -->
            <!-- <img src="chemin/vers/votre/image.jpg" alt="Nom du Jeu"> -->
        </div>
        <?php if (count($data['scores']) > 0): ?>
            <table border='1'>
                <tr>
                    <th>Nom du Joueur</th>
                    <th>Score</th>
                    <th>Date</th>
                </tr>
                <?php foreach ($data['scores'] as $score): ?>
                    <tr>
                        <td><?= $score['name'] ?></td>
                        <td><?= $score['score'] ?></td>
                        <td><?= $score['date'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aucun score trouvé pour ce jeu.</p>
        <?php endif; ?>


        <?php  $data = $gameController->getGameInfoid(2); ?>
        <div class="game-info">
            <h1><?= $data['gameName'] ?></h1>
            <!-- L'image du jeu peut être ajoutée ici -->
            <!-- <img src="chemin/vers/votre/image.jpg" alt="Nom du Jeu"> -->
        </div>
        <?php if (count($data['scores']) > 0): ?>
            <table border='1'>
                <tr>
                    <th>Nom du Joueur</th>
                    <th>Score</th>
                    <th>Date</th>
                </tr>
                <?php foreach ($data['scores'] as $score): ?>
                    <tr>
                        <td><?= $score['name'] ?></td>
                        <td><?= $score['score'] ?></td>
                        <td><?= $score['date'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aucun score trouvé pour ce jeu.</p>
        <?php endif; ?>
    </section>
</body>
</html>
