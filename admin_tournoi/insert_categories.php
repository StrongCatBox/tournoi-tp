<?php
// Assurez-vous de remplacer les valeurs de connexion à la base de données par les vôtres
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tournois";

// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Tableau des catégories de tournois à insérer dans la base de données
$categories = array(
    "Catastrophe",
    "Bataille de Bâtiments",
    "Raid Royaume",
    "Epreuve Epique",
    "Ultimate Survie"
    // Ajoutez plus de catégories ici si nécessaire
);

// Préparer et exécuter la requête d'insertion pour chaque catégorie
foreach ($categories as $categorie) {
    $sql = "INSERT INTO categories (nomCategorie) VALUES ('$categorie')";
    if ($conn->query($sql) === FALSE) {
        echo "Erreur lors de l'insertion de la catégorie '$categorie' : " . $conn->error . "<br>";
    } else {
        echo "Catégorie '$categorie' insérée avec succès.<br>";
    }
}

// Fermer la connexion à la base de données
$conn->close();
