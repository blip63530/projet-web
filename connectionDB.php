<?php
    $LoginFile = 'loginDB.php';
    include $LoginFile;


    // Établir une connexion à la base de données MySQLi
    $conn = new mysqli($servername, $username, $password, $dbname, 3306);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion : " . $conn->connect_error);
    } else {
        echo "Connexion à la base de données réussie.";
    }

    // Vous pouvez maintenant exécuter des requêtes MySQL en utilisant cette connexion $conn.

    // Fermer la connexion lorsque vous avez terminé
    $conn->close();
?>