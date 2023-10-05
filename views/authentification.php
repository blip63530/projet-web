<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<head>
    <meta charset="UTF-8">
    <title>Projet web</title>
</head>

<body class="d-flex flex-column min-vh-100">


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






</body>

</html>