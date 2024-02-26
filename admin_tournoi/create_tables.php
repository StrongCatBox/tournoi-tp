<?php

// Assurez-vous de remplacer les valeurs de connexion à la base de données par les vôtres
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tournois";

// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Créer la base de données s'il elle n'existe pas
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === FALSE) {
    echo "Erreur lors de la création de la base de données : " . $conn->error;
}

// Sélectionner la base de données
$conn->select_db($dbname);

// Créer la table 'equipes' si elle n'existe pas
$sql = "CREATE TABLE IF NOT EXISTS equipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomEquipe VARCHAR(255) NOT NULL,
    idCategorie VARCHAR(50) NOT NULL
)";
if ($conn->query($sql) === FALSE) {
    echo "Erreur lors de la création de la table 'equipes' : " . $conn->error;
}

// Créer la table 'categories' si elle n'existe pas
$sql = "CREATE TABLE IF NOT EXISTS categories (
    idCategorie INT AUTO_INCREMENT PRIMARY KEY,
    nomCategorie VARCHAR(50) NOT NULL
)";
if ($conn->query($sql) === FALSE) {
    echo "Erreur lors de la création de la table 'categories' : " . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
