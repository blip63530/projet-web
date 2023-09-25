<?php
// Fichier de configuration contenant les informations de connexion
include 'config.php';

function connectDB() {
    global $servername, $username, $password, $dbname;

    try {
        // Connexion à la base de données
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Configuration de PDO pour générer des exceptions en cas d'erreur
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connexion à la base de données réussie. :) :) :) :) :) :) :)";
        return $pdo;
    } catch (PDOException $e) {
        // En cas d'erreur de connexion, affichez le message d'erreur
        echo "NOOOOOT CONNEECTEEEED :( :( :( :( :( :( ";
        die("Erreur de connexion : " . $e->getMessage());
    }
}

// Appel de la fonction de connexion
$pdo = connectDB();

// Vous pouvez maintenant utiliser $pdo pour exécuter des requêtes SQL
// Par exemple : $pdo->query("SELECT * FROM ma_table");

// Fermez la connexion lorsque vous avez terminé
$pdo = null;
?>