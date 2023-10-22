<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
       

        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
    </style>

    <title>Projet web</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- slideshow -->
    <div class="w3-content w3-display-container">
        <div class="mySlides">
            <img src="img/index/flappy.png" width="800" height="500">
            <div class="game-info">
                <h2 style="font-family: 'Press Start 2P', cursive; margin-bottom:2rem;" >Flappy Bird</h2>
                <p>Essayez de faire voler l'oiseau à travers les tuyaux sans le faire toucher les obstacles. Un jeu d'adresse classique!</p>
                <a href="index.php?page=floppy" class="w3-button w3-orange game-button">Jouer maintenant!</a>
            </div>
        </div>
        <div class="mySlides">
            <img src="img/index/snake.png" width="800" height="500">
            <div class="game-info">
                <h2 style="font-family: 'Press Start 2P', cursive; margin-bottom:2rem;" >Snake</h2>
                <p>Contrôlez le serpent et mangez les pommes pour grandir. Évitez de vous heurter aux murs ou à votre propre queue!</p>
                <a href="index.php?page=snake" class="w3-button w3-orange game-button">Jouer maintenant!</a>
            </div>
        </div>

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
            if (n > x.length) {
                slideIndex = 1;
            }
            if (n < 1) {
                slideIndex = x.length;
            }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex - 1].style.display = "block";
        }
    </script>
</body>

</html>
