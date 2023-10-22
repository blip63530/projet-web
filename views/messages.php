<?php
$userController = new userController();
$messages = $userController->getMessages();
?>

<!DOCTYPE html>
<html lang="en">

<style>
    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        padding: 15px;
        text-align: center;
    }

    th {
        background-color: #ffb320;
        color: #333;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    h1 {
        margin-top: 2rem;
        text-align: center;
        margin-bottom: 2rem;
    }
.icon {
        font-size: 20px; /* Taille de l'icône en pixels */
        color: #000;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
</head>

<body>

    <div class="center">
        <h1>Messages Reçus</h1>

        <table border="1">
            <thead>
                <tr>
                    <th>Nom de l'Expéditeur</th>
                    <th>Contenu du Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($messages as $message) {
                echo "<tr>";
                echo "<td>{$message['NomExpediteur']}</td>";
                echo "<td>{$message['Message']}</td>";
                echo "<td><a href='index.php?page=envoyerMSG'><i class='fa fa-reply icon' aria-hidden='true'></i></a> <a href='#'><i class='fa fa-trash icon' aria-hidden='true'></i></a></td>"; // Nouvelle colonne pour les icônes
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</body>

</html>