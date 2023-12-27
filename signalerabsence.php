<?php
require_once 'signalerabsenceModel.php';

$parentId = isset($_GET['parent_id']) ? intval($_GET['parent_id']) : 0;

if ($parentId <= 0) {
    header("Location: erreur.php");
    exit();
}

$model = new AbsenceModel();
$children = $model->getChildren($parentId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signaler l'absence ou le retard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f9f9f9;
        }

        .container {
            width: 350px;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block; /* Pour forcer le label à occuper toute la largeur */
        }

        input[type="text"],
        input[type="date"],
        textarea,
        select {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            width: 100%; /* Ajustement pour occuper toute la largeur */
        }

        button {
            background-color: #ff5100;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Signaler l'absence ou le retard de votre enfant</h1>
        <form id="absenceForm" action="insertAbsence.php" method="post">
            <label for="enfantSelect">Enfant:</label>
            <select id="enfantSelect" name="enfantSelect" required>
                <?php foreach ($children as $child): ?>
                    <option value="<?php echo $child['id']; ?>">
                        <?php echo $child['firstName'] . ' ' . $child['lastName']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="class">Classe:</label>
            <input type="text" id="class" name="class" required>

            <label for="date">Date d'absence ou de retard:</label>
            <input type="date" id="date" name="date" required>

            <label for="comments">Commentaires:</label>
            <textarea id="comments" name="comments" rows="4"></textarea>

            <button type="submit">Soumettre</button>
        </form>
    </div>
</body>
</html>
