<?php
require('create_tables.php');

// Traitement des données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nomEquipe = $_POST["nomEquipe"];
    $categorieTournois = $_POST["categorieTournois"];

    // Validation des données (vous pouvez ajouter des validations supplémentaires ici)

    // Insertion dans la base de données
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

    // Recherche de l'ID de la catégorie de tournois
    $sql = "SELECT idCategorie FROM categories WHERE nomCategorie = '$categorieTournois'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $idCategorie = $row["idCategorie"];

        // Préparer et exécuter la requête d'insertion
        $query = "INSERT INTO equipes (nomEquipe, idCategorie) VALUES ('$nomEquipe', '$idCategorie')";

        if ($conn->query($query) === TRUE) {
            // Redirection vers la même page pour éviter la soumission multiple du formulaire
            header("Location: enregistrer_equipe.php");
            exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
        } else {
            echo "Erreur lors de l'enregistrement de l'équipe : " . $conn->error;
        }
    } else {
        echo "Catégorie de tournois invalide.";
    }

    // Fermer la connexion à la base de données
    $conn->close();
}
?>

<?php include('header.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrer une nouvelle équipe</title>
    <style>
        .body-div {
            font-family: Arial, sans-serif;
            background-image: url("bgfortnite.jpg");
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #000000;
            padding: 30px;
            border-radius: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #ffffff;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #ffffff;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #928d8d;
            border-radius: 5px;
            appearance: none;
            background-color: #f9f9f9;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #928d8d;
            border-radius: 5px;
            background-color: #f9f9f9;
            color: #333;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 30px;
            background-color: #880567;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #420129;
        }

        #equipeEnregistree {
            margin-top: 20px;
            background-color: #000000;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li {
            list-style: none;
            margin-bottom: 5px;
        }

        li:first-child {
            font-weight: bold;
        }

        .formula {
            background-color: black;
            padding: 50px;
            border-radius: 30px;
        }

        table {
            background-color: black;
            color: white;
            /* Ajout de la couleur de fond blanche */

            width: 50%;
        }
    </style>
</head>

<body>
    <div class="body-div">

        <div class="formula">
            <h2>Enregistrer une nouvelle équipe</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="nomEquipe">Nom de l'équipe :</label>
                <input type="text" id="nomEquipe" name="nomEquipe" required><br><br>

                <label for="categorieTournois">Catégorie de tournois :</label>
                <select id="categorieTournois" name="categorieTournois" required>
                    <option value="Catastrophe">Catastrophe</option>
                    <option value="Bataille de Bâtiments">Bataille de Bâtiments</option>
                    <option value="Raid Royaume">Raid Royaume</option>
                    <option value="Epreuve Epique">Epreuve Epique</option>
                    <option value="Ultimate Survie">Ultimate Survie</option>
                    <!-- Ajoutez plus d'options ici -->
                </select><br><br>

                <input type="submit" value="Enregistrer l'équipe">
            </form>
        </div>


        <?php
        // Créer une nouvelle connexion à la base de données
        $conn2 = new mysqli($servername, $username, $password, $dbname);

        // Vérifier la connexion
        if ($conn2->connect_error) {
            die("Connection failed: " . $conn2->connect_error);
        }

        // Afficher les équipes existantes
        $sql = "SELECT nomEquipe, nomCategorie FROM equipes INNER JOIN categories ON equipes.idCategorie = categories.idCategorie";
        $result = $conn2->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Équipes existantes :</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Nom de l'équipe</th><th>Catégorie de tournois</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["nomEquipe"] . "</td><td>" . $row["nomCategorie"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Aucune équipe enregistrée.";
        }

        // Fermer la connexion à la base de données
        $conn2->close();
        ?>

    </div>
</body>

</html>