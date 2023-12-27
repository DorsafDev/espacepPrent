<?php
require_once 'Database.php';

// Supposons que vous avez un utilisateur connecté et son ID est stocké dans une session
// Vous devez ajuster cette partie selon votre logique d'authentification
$parentId = isset($_GET['parent_id']) ? intval($_GET['parent_id']) : 0;

if ($parentId <= 0) {
    header("Location: erreur.php");
    exit();
}

$db = new Database();

// Récupérez les activités inscrites par le parent avec le nom de l'enfant
$getActivitiesQuery = $db->prepare("
    SELECT ai.*, u.firstName as child_firstName, u.lastName as child_lastName
    FROM activites_inscrites ai
    JOIN utilisateur u ON ai.eleve_id = u.id
    WHERE ai.parent_id = :parent_id
");
$getActivitiesQuery->bindParam(':parent_id', $parentId);
$getActivitiesQuery->execute();
$activities = $getActivitiesQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Mettez en place vos balises head ici -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activités Inscrites</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            border: 1px solid #ccc;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Activités Inscrites</h2>

        <?php if (count($activities) > 0): ?>
            <ul>
                <?php foreach ($activities as $activity): ?>
                    <li>
                        <strong>Activité:</strong> <?php echo $activity['nom_activite']; ?><br>
                        <strong>Enfant:</strong> <?php echo $activity['child_firstName'] . ' ' . $activity['child_lastName']; ?><br>
                        <!-- Ajoutez d'autres informations si nécessaire -->
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Aucune activité inscrite pour le moment.</p>
        <?php endif; ?>
    </div>
</body>
</html>
