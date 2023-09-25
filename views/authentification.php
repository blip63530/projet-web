<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="index.css">

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
            <div class="p-3" style="background-color: #f8f9fa;">
                <form action="/profile.php">
                    <div class="mb-3 mt-3">
                        <label for="username" class="form-label">Nom d'utilisateur:</label>
                        <input type="username" class="form-control" id="Username" placeholder="Entrez votre identifiant" name="IdName" autocomplete="username">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Mot de passe:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Entrez votre mot de passe" name="pswd" autocomplete="password">
                    </div>
                    <div class="form-check mb-3">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Se souvenir de moi
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Fin de la Section du profile -->


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