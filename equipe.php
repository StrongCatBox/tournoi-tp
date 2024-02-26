<?php include('header.php');
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix des Équipes - Fortnite Championships</title>
    <style>
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
            border: 1px solid #928d8d;
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

        #listeJoueurs {
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
    </style>
</head>

<body>
    <div class="body-div">
        <div class="container">
            <h1>Choix des Équipes - Fortnite Championships</h1>
            <label for="equipe">Choisir une équipe :</label>
            <select id="equipe">
                <option value="faze">FaZe Clan</option>
                <option value="tsm">Team SoloMid (TSM)</option>
                <option value="liquid">Team Liquid</option>
                <option value="nrg">NRG Esports</option>
                <option value="100t">100 Thieves</option>
                <option value="fnatic">Fnatic</option>
                <option value="vp">Virtus.pro</option>
                <option value="navi">Natus Vincere (Na'Vi)</option>
                <option value="g2">G2 Esports</option>
                <option value="secret">Team Secret</option>
            </select>
            <button onclick="afficherJoueurs()">Afficher les Joueurs</button>
            <div id="listeJoueurs"></div>
        </div>
    </div>

    <script>
        function afficherJoueurs() {
            var equipe = document.getElementById("equipe").value;
            var listeJoueurs = document.getElementById("listeJoueurs");

            // Effacer le contenu précédent
            listeJoueurs.innerHTML = "";

            // Générer la liste des joueurs en fonction de l'équipe choisie
            switch (equipe) {
                case "faze":
                    listeJoueurs.innerHTML = "<h2>FaZe Clan</h2><ul><li>Mongraal</li><li>Benjyfishy</li><li>MrSavage</li></ul>";
                    break;
                case "tsm":
                    listeJoueurs.innerHTML = "<h2>Team SoloMid (TSM)</h2><ul><li>Myth</li><li>ZexRow</li><li>Commandment</li></ul>";
                    break;
                case "liquid":
                    listeJoueurs.innerHTML = "<h2>Team Liquid</h2><ul><li>Chap</li><li>Cented</li><li>Co1azo</li></ul>";
                    break;
                case "nrg":
                    listeJoueurs.innerHTML = "<h2>NRG Esports</h2><ul><li>Zayt</li><li>UnknownxArmy</li><li>Edgey</li></ul>";
                    break;
                case "100t":
                    listeJoueurs.innerHTML = "<h2>100 Thieves</h2><ul><li>Kenith</li><li>Arkhram</li><li>Rehx</li></ul>";
                    break;
                case "fnatic":
                    listeJoueurs.innerHTML = "<h2>Fnatic</h2><ul><li>Motor</li><li>Anas</li><li>Vorwenn</li></ul>";
                    break;
                case "vp":
                    listeJoueurs.innerHTML = "<h2>Virtus.pro</h2><ul><li>TrainHard</li><li>Awex</li><li>LilLex</li></ul>";
                    break;
                case "navi":
                    listeJoueurs.innerHTML = "<h2>Natus Vincere (Na'Vi)</h2><ul><li>K1nky</li><li>4zr</li><li>Flikk</li></ul>";
                    break;
                case "g2":
                    listeJoueurs.innerHTML = "<h2>G2 Esports</h2><ul><li>Hen</li><li>JannisZ</li><li>Teaguey</li></ul>";
                    break;
                case "secret":
                    listeJoueurs.innerHTML = "<h2>Team Secret</h2><ul><li>Mitr0</li><li>Secret_Domentos</li><li>Secret_Mongraal</li></ul>";
                    break;
                default:
                    listeJoueurs.innerHTML = "<p>Veuillez sélectionner une équipe.</p>";
            }
        }
    </script>
</body>

</html>