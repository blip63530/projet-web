<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="index.css">

<?PHP 
$curPageName = $_SERVER['HTTP_REFERER'];
$query = parse_url($curPageName);
parse_str($query,$id);

?>
<head>
    <meta charset="UTF-8">
    <title>Projet web</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <header class="header-section">
        <div class="container">
            <!-- logo -->
            <a class="site-logo" href="../index.php">
                <img src="img\lgg.png" alt="">
            </a>
            <div class="user-panel">
                <a href="authentification.php">Se connecter</a> / <a href="#">Inscription</a>
            </div>

            <!--  menu site -->
            <nav class="main-menu">
                <ul>
                    <li><a href="../index.php">Accueil</a></li>
                    <li><a href="jeux.php">Jeux</a></li>
                    <li><a href="classements.php">Classements</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Section du profile -->

    <section class="h-100 gradient-custom-2">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                    <div class="card">
                        <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">

                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                <img src="img\gamer.png" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                                <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark" style="z-index: 1;">
                                    Modifier mon profile
                                </button>
                            </div>
                            <div class="ms-3" style="margin-top: 130px;">
                                <h5><?php echo $id['IdName'];  ?></h5>
                                <p>Limoges</p>
                            </div>
                        </div>
                        <div class="p-4 text-black" style="background-color: #f8f9fa;">
                            <div class="d-flex justify-content-end text-center py-1">
                                <div class="user-panel">
                                    <a href="#">Envoyer un message</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4 text-black">
                            <div class="mb-5">
                                <p class="lead fw-normal mb-3">A propos</p>
                                <div class="p-4" style="background-color: #f8f9fa;">
                                    <p class="font-italic mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                            <div class=" justify-content-between align-items-center mb-4">
                                <p class="lead fw-normal mb-3">Records</p>

                                <section class="content-info p-4">
                                    <div class="container paddings-mini">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table-striped table-responsive table-hover result-point">
                                                    <thead class="point-table-head">
                                                        <tr>
                                                            <th class="text-left">Jeu</th>
                                                            <th class="text-left">Record</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                        <tr>
                                                            <td class="text-left number">1 <i class="fa fa-caret-up" aria-hidden="true"></i></td>
                                                            <td class="text-left">
                                                                <span>Record 1</span>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td class="text-left number">2 <i class="fa fa-caret-up" aria-hidden="true"></i></td>
                                                            <td class="text-left">
                                                                <span>Record 2</span>
                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </section>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


    <!-- Fin de la Section du profile -->


    <?php
    include 'connectionDB.php';

    ?>

    <footer class="footer-section mt-auto">
        <div class="container">
            <ul class="footer-menu">
                <li><a href="../index.php">Accueil</a></li>
                <li><a href="jeux.php">Jeux</a></li>
                <li><a href="classement.php">Classements</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <p class="copyright">
                Copyright ©2023 All rights reserved

            </p>
        </div>
    </footer>



</body>

</html>