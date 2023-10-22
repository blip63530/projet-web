<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="index.css">

<?PHP 



?>
<head>
    <meta charset="UTF-8">
    <title>Projet web</title>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Section du profile -->

    <section class="h-100 gradient-custom-2">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="p-3" style="background-color: #f8f9fa;">
            <form action="index.php?page=majprofil" method="POST">
                    <div class="mb-3 mt-3">
                        <label for="city" class="form-label">Ville:</label>
                        <input type="city" class="form-control" id="city" placeholder="Entrez votre ville" name="city" >
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Description:</label>
                        <input type="desc" class="form-control" id="desc" placeholder="Entrez votre description" name="desc">
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
            </div>
</div>
        </div>
        </div>
    </section>


    <!-- Fin de la Section du profile -->

</body>

</html>