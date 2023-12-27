<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Parent - Rapports Approuvés</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.1);
        }

        .header {
            background-color: #ff5100;
            color: #fff;
            text-align: center;
            padding: 20px;
            margin-bottom: 20px;
        }

        h1, h2, h3 {
            color: #222;
        }

        .rapport {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #b8dcce;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .rapport:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.1);
            transform: scale(1.02);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Rapports Approuvés</h1>
        </div>

        <?php
        include 'database.php';
        include 'RapportModel.php';
        include 'RapportController.php';

        // Créer une instance de la classe Database
        $database = new Database();

        // Créer une instance du modèle Rapport
        $rapportModel = new RapportModel($database);

        // Créer une instance du contrôleur Rapport
        $rapportController = new ControllerRapport($rapportModel);

        // Vérifier si l'ID du parent est présent dans la requête GET
        $parentId = isset($_GET['parent_id']) ? intval($_GET['parent_id']) : 0;

        // Vérifier si l'ID du parent est valide
        if ($parentId <= 0) {
            header("Location: erreur.php");
            exit();
        }

        // Récupérer et afficher les rapports approuvés de chaque enfant du parent
        $rapportsEleve = $rapportController->getRapportsEleveParent($parentId);

        if (!empty($rapportsEleve)) {
            echo "Rapports approuvés des enfants du parent ".  $parentId;

            foreach ($rapportsEleve as $rapport) {
                echo "<div class='rapport'>";
                
                echo "<p>" . $rapport['contenu'] . "</p>";
                // Ajoutez d'autres éléments du rapport que vous souhaitez afficher
                echo "</div>";
            }
        } else {
            echo "<p>Aucun rapport approuvé disponible pour les enfants du parent.</p>";
        }
        ?>

    </div>
    <!-- Ajoutez ici vos scripts JavaScript si nécessaire -->
</body>

</html>

