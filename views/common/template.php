<!DOCTYPE html>
<html lang="fr">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="index.css">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?=$page_description;?>">
    <title><?=$page_title;?></title>

</head>

<!--header-->

<header class="header-section">
    <div class="container">
        <!-- logo -->
        <a class="site-logo" href="index.php?page=acceuil">
            <img src="img\lgg.png" alt="">
        </a>
        <div class="user-panel">
            <a class="nav-link " href ="index.php?page=authentification">Se connecter</a> / <a href="index.php?page=inscription">Inscription</a>
        </div>

        <!--  menu site -->
        <nav class="main-menu">
            <ul>
                <li><a href="acceuil">Accueil</a></li>
                <div class="dropdown">
                    <button class="dropbtn">Dropdown</button>
                    <div class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </div>
                <li><a href="jeux.php">Jeux</a></li>
                <li><a href="classements.php">Classements</a></li>
                <li><a href="index.php?page=contact">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>




<body class="d-flex flex-column min-vh-100" >
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!--<php require_once ("views/acceuil.php");?>-->
<div class="page_content">
    <?=$page_content;?>
</div>


</body>


<!-- footer -->
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

</html>