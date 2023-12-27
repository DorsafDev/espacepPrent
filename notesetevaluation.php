<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            margin: 0;
            background-color: #f9f9f9;
        }

        .container {
            text-align: center;
            width: 60%;
            margin-top: 50px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
        }

        th {
            background-color: #ff5100;
        }

        h2,
        h3 {
            color: #333;
            margin-bottom: 30px;
        }

        #evaluation {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            margin-bottom: 20px;
        }

        #evaluation p {
            color: #555;
        }

        /* CSS pour les animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        #studentTable {
            animation: fadeIn 1s;
        }
    </style>
    <title>Notes et Évaluation</title>
</head>
<body>


<?php
    require_once 'notesController.php';

    $notesController = new notesController();

    $parentId = isset($_GET['parent_id']) ? intval($_GET['parent_id']) : 0;

    if ($parentId <= 0) {
        header("Location: erreur.php");
        exit();
    }

    $parentGrades = $notesController->getParentGrades($parentId);
    ?>

    <div class="container">
        <h2>Notes et Évaluation des Enfants du parent</h2>
        <table id="studentTable">
            <tr>
                <th>Matière</th>
                <th>Note</th>
            </tr>
            <?php foreach ($parentGrades as $grade) : ?>
                <tr>
                    <td><?php echo isset($grade['matiere']) ? $grade['matiere'] : ''; ?></td>
                    <td><?php echo isset($grade['note']) ? $grade['note'] : ''; ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td><strong>Moyenne Totale</strong></td>
                <td colspan="2"><strong>
                        <?php
                        $total = 0;
                        $count = count($parentGrades);

                        foreach ($parentGrades as $grade) {
                            $total += intval($grade['note']);
                        }

                        $average = $count > 0 ? $total / $count : 0;
                        echo number_format($average, 2);
                        ?>/10</strong></td>
            </tr>
        </table>
        <div id="evaluation" class="show">
            <h3>Évaluation Globale</h3>
            <p>L'étudiant a montré de très bonnes performances dans la plupart des matières, mais il a besoin de s'améliorer en Éducation Civique.</p>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const rows = document.querySelectorAll('#studentTable tr');

            rows.forEach(row => {
                const cells = row.querySelectorAll('td:nth-child(2)');
                cells.forEach(cell => {
                    const cellValue = parseInt(cell.innerText);
                    if (cellValue < 5) {
                        row.style.backgroundColor = '#ffcccc';
                    }
                });
            });

            // Calcul de la moyenne totale
            const gradeCells = document.querySelectorAll('#studentTable td:nth-child(2)');
            let sum = 0;
            let count = 0;

            gradeCells.forEach(cell => {
                const value = parseInt(cell.innerText);
                if (!isNaN(value)) {
                    sum += value;
                    count++;
                }
            });

            const average = sum / count;
            const totalRow = document.querySelector('#studentTable tr:last-child');
            const averageCell = totalRow.querySelector('td:last-child');
            averageCell.innerText = `${average.toFixed(2)}/10`;
            totalRow.classList.add('average-row');
        });
    </script>
</body>

</html>
