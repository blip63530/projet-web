<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="index.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .mySlides {display:none;}
    </style>

    <title>Projet web</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


<header class="header-section">
    <div class="container">
        <!-- logo -->
        <a class="site-logo" href="index.php">
            <img src="img\lgg.png" alt="">
        </a>
        <div class="user-panel">
            <a href="authentification.php">Se connecter</a> / <a href="#">Inscription</a>
        </div>

        <!--  menu site -->
        <nav class="main-menu">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="jeux.php">Jeux</a></li>
                <li><a href="classements.php">Classements</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- slideshow -->

<h2 class="w3-center">Jeux</h2>

<div class="w3-content w3-display-container">
    <img class="mySlides" src="img/index/ex1.jpg" style="width:100%">
    <img class="mySlides" src="img/index/ex2.jpg" style="width:100%">
    <img class="mySlides" src="img/index/ex3.jpg" style="width:100%">
    <img class="mySlides" src="img/index/ex1.jpg" style="width:100%">

    <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
    <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
</div>

<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex-1].style.display = "block";
    }
</script>




















<footer class="footer-section">
    <div class="container">
        <ul class="footer-menu">
            <li><a href="index.php">Accueil</a></li>
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
