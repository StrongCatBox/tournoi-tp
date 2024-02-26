<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* Ajoutez votre CSS pour le style du header ici */

        body {
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #000000;
            color: #fff;
            padding: 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;



        }


        header img {
            width: 100px;
            /* Ajustez la taille du logo selon vos besoins */

        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 120px;
            /* Ajustez la taille du conteneur selon vos besoins */
            height: 120px;
            /* Ajustez la taille du conteneur selon vos besoins */
            border-radius: 50%;
            /* Créer un cercle avec le logo */
            background-color: #007bff;
            /* Couleur de fond du cercle */
            overflow: hidden;
            /* Masquer tout contenu débordant du conteneur */
        }

        .logo-container img {
            width: 95px;
            /* Ajustez la taille du logo selon vos besoins */
            height: auto;
            /* Pour conserver les proportions de l'image */
        }


        header h1 {
            margin: 0;
        }

        header nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        header nav ul li {
            margin-right: 20px;
        }

        header nav ul li:last-child {
            margin-right: 0;
        }

        header nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        header nav ul li a:hover {
            color: #ccc;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo-container" style="background-color: #ffffff;">
            <img src="FNCS.png" alt="Logo"> <!-- Remplacez "votre-logo.png" par le chemin de votre logo -->
        </div>

        <nav>
            <ul>
                <li><a href="enregistrer_equipe.php"><i class="fas fa-users"></i></a></li>
                <li><a href="ajouter_match.php"><i class="fas fa-gamepad"></i></a></li>
                <li><a href="feuille_de_match.php"><i class="fas fa-file-alt"></i></a></li>
            </ul>
        </nav>
    </header>

</body>

</html>