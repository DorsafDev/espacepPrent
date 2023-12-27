<?php
require_once 'inscriptionactiviteModel.php';

$parentId = isset($_GET['parent_id']) ? intval($_GET['parent_id']) : 0;

if ($parentId <= 0) {
    header("Location: erreur.php");
    exit();
}

$model = new ActivityModel();
$children = $model->getChildren($parentId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription aux Activités</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        input[type="text"], input[type="email"], select {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #ff5100;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color:#45a049;
        }
        label {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Inscription aux Activités</h2>
        <form id="activityForm" method="post" action="traitement.php">
            <label for="enfantSelect">Enfant</label>
            <select id="enfantSelect" name="enfantSelect" required>
                <?php foreach ($children as $child): ?>
                    <option value="<?php echo $child['parent_id']; ?>">
                        <?php echo $child['firstName'] . ' ' . $child['lastName']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Votre email.." required>

            <label for="activity">Activité</label>
            <select id="activity" name="activity">
                <option value="football">Football</option>
                <option value="natation">Natation</option>
                <option value="choregraphie">Chorégraphie</option>
                <option value="chess">Échecs</option>
            </select>

            <!-- Ajout du champ caché pour le parent_id -->
            <input type="hidden" name="parent_id" value="<?php echo $parentId; ?>">

            <input type="submit" value="S'inscrire">
        </form>

        <!-- Ajouter un lien vers la page activites_inscrites.php avec le parent_id -->
        <p>Déjà inscrit? <a href="activites_inscrites.php?parent_id=<?php echo $parentId; ?>">Voir les activités inscrites</a></p>
    </div>
</body>
</html>
