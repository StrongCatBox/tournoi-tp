<?php include('header.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classement - Fortnite Championships</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            color: white;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #000000;
        }
    </style>
</head>

<body>

    <div class="body-div">
        <div class="container">
            <h1>Classement - Fortnite Championships</h1>
            <label for="categorie">Choisir une catégorie de match :</label>
            <select id="categorie">
                <option value="tous">Tous les matchs</option>
                <option value="Tilted Towers">Tilted Towers</option>
                <option value="Retail Row">Retail Row</option>
                <option value="Pleasant Park">Pleasant Park</option>
                <!-- Ajoutez plus d'options ici -->
            </select>
            <button onclick="afficherClassement()">Afficher</button>
            <div id="classement"></div>
        </div>
    </div>

    <script>
        function afficherClassement() {
            var categorie = document.getElementById("categorie").value;
            var classement = document.getElementById("classement");
            classement.innerHTML = ""; 
           
            var matchs = [{
                    salle: "Tilted Towers",
                    equipe1: "FaZe Clan",
                    points1: 25,
                    equipe2: "Team Liquid",
                    points2: 20
                },
                {
                    salle: "Retail Row",
                    equipe1: "FaZe Clan",
                    points1: 28,
                    equipe2: "Team Liquid",
                    points2: 22
                },
                {
                    salle: "Pleasant Park",
                    equipe1: "FaZe Clan",
                    points1: 30,
                    equipe2: "Team Secret",
                    points2: 18
                },
                // Ajoutez plus de données de matchs ici
            ];

            var pointsEquipes = {};

            var nombreMatchsEquipes = {};

           
            matchs.forEach(function(match) {
                if (categorie === "tous" || match.salle === categorie) {
                    if (!pointsEquipes[match.equipe1]) {
                        pointsEquipes[match.equipe1] = 0;
                        nombreMatchsEquipes[match.equipe1] = 0;
                    }
                    if (!pointsEquipes[match.equipe2]) {
                        pointsEquipes[match.equipe2] = 0;
                        nombreMatchsEquipes[match.equipe2] = 0;
                    }
                    pointsEquipes[match.equipe1] += match.points1;
                    pointsEquipes[match.equipe2] += match.points2;
                    nombreMatchsEquipes[match.equipe1]++;
                    nombreMatchsEquipes[match.equipe2]++;
                }
            });

            
            var classementEquipes = [];
            for (var equipe in pointsEquipes) {
                if (pointsEquipes.hasOwnProperty(equipe)) {
                    classementEquipes.push({
                        equipe: equipe,
                        points: pointsEquipes[equipe],
                        matchs: nombreMatchsEquipes[equipe]
                    });
                }
            }

            // Trier le tableau par points (du plus grand au plus petit)
            classementEquipes.sort(function(a, b) {
                return b.points - a.points;
            });

            // Afficher le classement des équipes dans un tableau
            var table = document.createElement("table");
            var headerRow = table.insertRow();
            var headers = ["Position", "Équipe", "Points", "Nombre de matchs"];
            headers.forEach(function(header) {
                var th = document.createElement("th");
                th.textContent = header;
                headerRow.appendChild(th);
            });

            classementEquipes.forEach(function(equipe, index) {
                var row = table.insertRow();
                var positionCell = row.insertCell();
                var equipeCell = row.insertCell();
                var pointsCell = row.insertCell();
                var matchsCell = row.insertCell();

                positionCell.textContent = index + 1;
                equipeCell.textContent = equipe.equipe;
                pointsCell.textContent = equipe.points;
                matchsCell.textContent = equipe.matchs;
            });

            classement.appendChild(table);
        }
    </script>
</body>

</html>