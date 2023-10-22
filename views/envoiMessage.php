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
        <div class="container py-5 h-100 d-flex justify-content-center">
            <div class="p-3" style="background-color: #f8f9fa;">
                <form action="index.php?page=sendMSG" method="POST">
                    <div class="mb-3 mt-3">
                        <label for="subjectname" class="form-label">Destinataire:</label>
                        <input type="subjectname" class="form-control" id="subjectname" placeholder="Nom du destinataire" name="subjectname" >
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message:</label>
                        <input type="message" class="form-control" id="message" placeholder="Entrez votre message" name="message">
                    </div>

                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Fin de la Section du profile -->






</body>

</html>