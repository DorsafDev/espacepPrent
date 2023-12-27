<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #header {
            text-align: center;
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
        }

        #header img {
            width: 50%;
            height: auto;
        }

        h1 {
            color: #ff5100;
        }

        #content {
            margin: 0 10%;
            padding-bottom: 60px;
        }

        h2 {
            margin-top: 20px;
            color: #ff5100;
        }

        p {
            margin-bottom: 10px;
            text-align: justify;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #ff5100;
            text-align: center;
            padding: 20px;
            color: #fff;
        }

        /* Animation pour le contenu */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        #content {
            animation: fadeIn 2s;
        }
    </style>
</head>

<body>
    <div id="header">
        <img src="LOGO.jpg" alt="Logo de l'école" />
        <h1>Règlement intérieur de [Nom de l'école]</h1>
    </div>

    
    <div id="content">
        <?php
        require_once 'Database.php';
        require_once 'ReglementController.php';

        $database = new Database();
        $reglementController = new ReglementController($database->getConnection());


        $informationsReglement = $reglementController->displayReglement();

        // Utilisez les données récupérées comme vous le souhaitez
        foreach ($informationsReglement as $info) {
            echo "<h2>" . $info['section'] . "</h2>";
            echo "<p>" . $info['contenu'] . "</p>";
        }
        ?>
    </div>

    <footer>
        <p>Pour toute question ou préoccupation concernant le règlement intérieur, veuillez contacter l'école aux
            coordonnées suivantes :</p>
        <p>[Nom de l'école] | [Adresse de l'école] | [Téléphone de l'école] | [Adresse e-mail de l'école]</p>
        <p>Nous vous remercions de votre coopération et de votre engagement envers le respect de notre règlement
            intérieur.</p>
    </footer>
</body>

</html>
