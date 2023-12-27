<?php
// Inclure votre classe Database
require_once 'Database.php';

// Vérifier si l'ID du parent est présent dans la requête GET
$parentId = isset($_GET['parent_id']) ? intval($_GET['parent_id']) : 0;

// Vérifier si l'ID du parent est valide
if ($parentId <= 0) {
    header("Location: erreur.php");
    exit();
}

// Créer une instance de la classe Database
$database = new Database();

// Préparer la requête SQL pour récupérer les devoirs des enfants du parent
$sql = "SELECT * FROM devoir WHERE eleve_id IN (SELECT eleve_id FROM enfant_parent WHERE parent_id = :parent_id)";
$stmt = $database->prepare($sql);
$stmt->bindParam(':parent_id', $parentId, PDO::PARAM_INT);
$stmt->execute();

// Récupérer les résultats de la requête
$devoirs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devoirs des enfants du parent</title>
    <style>
        /* Ajoutez vos styles CSS ici */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f9f9f9;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        h1 {
            text-align: center;
            padding: 20px 0;
            margin: 0;
            background-color: #ff5100;
            color: #fff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        
        td {
            color: #333;
            transition: background-color 0.3s;
        }
        td:hover {
            background-color: #e0e0e0;
            transition: background-color 0.3s;
        }
        tr {
            transition: background-color 0.3s;
        }
        tr:hover {
            background-color: #d0d0d0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Devoirs des enfants du parent</h1>
        <table>
            <tr>
                <th>Matière</th>
                <th>Devoir</th>
                <th>Date de remise</th>
            </tr>
            <?php foreach ($devoirs as $devoir): ?>
                <tr>
                    <td><?= htmlspecialchars($devoir['matiere']) ?></td>
                    <td><?= htmlspecialchars($devoir['titre']) ?></td>
                    <td><?= htmlspecialchars($devoir['deadline']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const today = new Date();
            const rows = document.querySelectorAll('tr');

            rows.forEach((row, index) => {
                if (index === 0) return; // skip the first row (header row)

                const dueDate = new Date(row.cells[2].innerText);
                const timeDiff = dueDate.getTime() - today.getTime();
                const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));

                if (daysDiff < 0) {
                    row.style.backgroundColor = 'red';
                    row.cells[2].innerText = 'Délai dépassé';
                } else if (daysDiff === 1) {
                    row.style.backgroundColor = 'orange';
                    row.cells[2].innerText += ' (Dernier jour)';
                } else if (daysDiff <= 3) {
                    row.style.backgroundColor = 'yellow';
                    row.cells[2].innerText += ' (Délai proche)';
                }
            });
        });
    </script>
</body>

</html>
