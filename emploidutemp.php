<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emploi du temps et horaires des événements - École privée XYZ</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 70%;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
    color: #333;
    text-align: center;
    margin-bottom: 20px;
    position: relative;
}

h2::after {
    content: '';
    display: block;
    width: 50%;
    height: 2px;
    background: linear-gradient(to right, #ff5100, #e6e6e6);
    position: absolute;
    bottom: -10px;
    left: 25%;
    border-radius: 2px;
    transition: width 0.3s;
}

h2:hover::after {
    width: 100%;
}

h2 span {
    background: #f4f4f4;
    padding: 0 10px;
}

h2 span::before, h2 span::after {
    content: '';
    display: block;
    height: 2px;
    background: #ff5100;
    position: absolute;
    width: 0;
    transition: width 0.3s;
}

h2 span::before {
    top: 0;
    left: 0;
}

h2 span::after {
    bottom: 0;
    right: 0;
}

h2:hover span::before, h2:hover span::after {
    width: 50%;
}


        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            animation: fadeIn 1s;
        }

        th {
            background-color: #ff5100;
            color: #fff;
            font-weight: bold;
            padding: 12px;
            animation: fadeIn 1s;
        }

        tr {
            animation: fadeIn 1s;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
            animation: fadeIn 1s;
        }

        tr:hover {
            background-color: #e6e6e6;
            animation: fadeIn 1s;
        }

        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
            animation: fadeIn 1s;
        }

        .separator {
            width: 100%;
            height: 4px;
            background-color: #ddd;
            margin: 30px 0;
            transition: width 0.3s, background-color 0.3s;
        }

        .separator:hover {
            width: 50%;
            background-color: #ff5100;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            background-color: #f9f9f9;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        li:hover {
            background-color: #e6e6e6;
        }

       

        @keyframes scaleAnimation {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fadeIn {
            animation: fadeIn 1s;
        }
    </style>
</head>


<?php
require_once('Database.php');
require_once 'EmpView.php';

// Vérifier si l'ID du parent est présent dans la requête GET
$parentId = isset($_GET['parent_id']) ? intval($_GET['parent_id']) : 0;

// Vérifier si l'ID du parent est valide
if ($parentId <= 0) {
    header("Location: erreur.php");
    exit();
}

// Créer une instance de la classe EmpView
$empView = new EmpView();
// Récupérer et afficher les emplois du temps de tous les enfants liés au parent
$allSchedules = $empView->getWeeklyScheduleForParent($parentId);

// Définir les valeurs de l'année et de la classe (remplacez-les par vos propres valeurs)
$year = 2023;
$class = 'VotreClasse';


?>
<body>
<div class="container fadeIn">
    
    <h2>Emploi du temps</h2>
    <?php
    // Récupérer et afficher les emplois du temps de tous les enfants liés au parent
    $schedule = $empView->getWeeklyScheduleForParent($parentId);

    foreach ($schedule as $childSchedule) {
        // Vérifier si les clés existent avant de les utiliser
        $year = isset($childSchedule['year']) ? $childSchedule['year'] : 'N/A';
        $class = isset($childSchedule['class']) ? $childSchedule['class'] : 'N/A';

        // Afficher l'emploi du temps
        $empView->displayWeeklySchedule($year, $class);
    }
    ?>
</div>
    

        
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const evenementListe = document.getElementById("evenement-liste");

            evenementListe.addEventListener("click", function (event) {
                if (event.target.tagName === "LI") {
                    event.target.classList.toggle("evenement");
                    event.target.classList.add("evenement-animation");
                }
            });
        });
    </script>
</body>

</html>
