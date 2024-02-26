<?php include('header.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matchs - Fortnite Championships</title>
    <style>
        /* Styles CSS */
        .body-div {
            font-family: Arial, sans-serif;
            background-image: url("bgfortnite.jpg");
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
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

        h1 {
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
            border: 1px solid #ccc;
            border-radius: 5px;
            appearance: none;
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

        #listeMatchs {
            margin-top: 20px;
            background-color: #302e2e;
            padding: 20px;
            border-radius: 5px;
        }

        .match {
            border-bottom: 1px solid #ccc;
            padding-bottom: 15px;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .salle-heure {
            text-align: center;
            font-size: 20px;
            color: #fffefe;
            margin-bottom: 10px;
        }

        .details {
            font-size: 16px;
            color: #ffffff;
        }

        .equipe {
            font-weight: bold;
        }

        .points {
            font-size: 24px;
        }
    </style>
</head>

<body>
    <div class="body-div">
        <div class="container">
            <h1>Matchs - Fortnite Championships</h1>
            <label for="equipe">Choisir une équipe :</label>
            <select id="equipe">
                <option value="FaZe Clan">FaZe Clan</option>
                <option value="Team SoloMid (TSM)">Team SoloMid (TSM)</option>
                <option value="Team Liquid">Team Liquid</option>
                <option value="NRG Esports">NRG Esports</option>
                <option value="100 Thieves">100 Thieves</option>
                <option value="Fnatic">Fnatic</option>
                <option value="Virtus.pro">Virtus.pro</option>
                <option value="Natus Vincere (Na'Vi)">Natus Vincere (Na'Vi)</option>
                <option value="G2 Esports">G2 Esports</option>
                <option value="Team Secret">Team Secret</option>
                <!-- Ajoutez plus d'options ici -->
            </select>
            <button onclick="afficherMatchs()">Afficher les matchs</button>
            <div id="listeMatchs"></div>
        </div>
    </div>

    <script>
        function afficherMatchs() {
            var equipe = document.getElementById("equipe").value;
            var listeMatchs = document.getElementById("listeMatchs");
            listeMatchs.innerHTML = ""; // Effacer le contenu précédent

            // Simuler des données de matchs
            var matchs = [{
                    salle: "Tilted Towers",
                    heure: "15:00",
                    equipe1: "FaZe Clan",
                    points1: 25,
                    equipe2: "Team Liquid",
                    points2: 20
                },
                {
                    salle: "Retail Row",
                    heure: "17:45",
                    equipe1: "FaZe Clan",
                    points1: 28,
                    equipe2: "Team Liquid",
                    points2: 22
                },
                {
                    salle: "Pleasant Park",
                    heure: "16:30",
                    equipe1: "FaZe Clan",
                    points1: 30,
                    equipe2: "Team Secret",
                    points2: 18
                }, // Exemple d'un match impliquant une autre équipe
                // Ajoutez plus de données de matchs ici
            ];

            // Afficher les matchs pour l'équipe sélectionnée
            var matchTrouve = false;
            matchs.forEach(function(match) {
                if (match.equipe1 === equipe || match.equipe2 === equipe) {
                    var detailsMatch = document.createElement("div");
                    detailsMatch.classList.add("match");
                    detailsMatch.innerHTML = "<div class='salle-heure'>" + match.salle + " - " + match.heure + "</div>" +
                        "<div class='details'>" + match.equipe1 + "</div>" +
                        "<div class='points'>" + match.points1 + " - " + match.points2 + "</div>" +
                        "<div class='details'>" + match.equipe2 + "</div>";
                    listeMatchs.appendChild(detailsMatch);
                    matchTrouve = true;
                }
            });

            if (!matchTrouve) {
                listeMatchs.innerHTML = "<p>Aucun match trouvé pour cette équipe.</p>";
            }
        }
    </script>
</body>

</html>