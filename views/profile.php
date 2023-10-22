<?php
$gameController = new GameController();
$scores = $gameController->getScoresInfo();
?>


<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="index.css">


<head>
    <meta charset="UTF-8">
    <title>Projet web</title>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Section du profile -->

    <section id="profile" class="h-100 gradient-custom-2">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                    <div class="card">
                        <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">

                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                <img src="img\gamer.png" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                                <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark" style="z-index: 1;">
                                    <a href="index.php?page=modifier">Modifier mon profile</a>

                                </button>
                            </div>
                            <div class="ms-3" style="margin-top: 130px;">
                                <h5><?php echo $_SESSION['login']  ?></h5>
                                <p><?php if(!empty($_SESSION['ville'])){echo $_SESSION['ville'];}?></p>
                            </div>
                        </div>
                        <div class="p-4 text-black" style="background-color: #f8f9fa;">
                            <div class="d-flex justify-content-end text-center py-1">
                                <div class="user-panel">
                                    <a href="index.php?page=envoyerMSG">Envoyer un message</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4 text-black">
                            <div class="mb-5">
                                <p class="lead fw-normal mb-3">A propos</p>
                                <div class="p-4" style="background-color: #f8f9fa;">
                                    <p class="font-italic mb-1"><?php if(!empty($_SESSION['desc'])){echo $_SESSION['desc'];}?></p>
                                </div>
                            </div>
                            <div class=" justify-content-between align-items-center mb-4">
                                <p class="lead fw-normal mb-3">Records</p>
                                <?php
                                if (!empty($scores)) {
                                    echo '<table class="table">';
                                    echo '<thead>';
                                    echo '<tr>';
                                    echo '<th class="text-left">Jeu</th>';
                                    echo '<th class="text-left">Score</th>';
                                    echo '<th class="text-left">Date</th>';
                                    echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                                    foreach ($scores as $score) {
                                        echo '<tr>';
                                        echo '<td class="text-left">' . $score['NomJeu'] . '</td>';
                                        echo '<td class="text-left">' . $score['ScoreNb'] . '</td>';
                                        echo '<td class="text-left">' . $score['dateScore'] . '</td>';
                                        echo '</tr>';
                                    }
                                    echo '</tbody>';
                                    echo '</table>';
                                } else {
                                    echo '<p>Aucun score trouvé</p>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


    <!-- Fin de la Section du profile -->

</body>

</html>