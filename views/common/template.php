<!DOCTYPE html>
<html lang="fr">
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
            <a class="nav-link " href ="index.php?page=authentification">Se connecter</a> / <a href="#">Inscription</a>
        </div>

        <!--  menu site -->
        <nav class="main-menu">
            <ul>
                <li><a href="acceuil">Accueil</a></li>
                <li><a href="jeux.php">Jeux</a></li>
                <li><a href="classements.php">Classements</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>




<body>
<!--<php require_once ("views/acceuil.php");?>-->
<?=$page_content;?>

</body>


<!-- footer -->
<footer class="footer-section">
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