<?php
// Inclure la définition de la classe Database
require_once 'Database.php';

// Créer une instance de la classe Database
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assurez-vous que les données sont présentes dans la requête POST
    if (isset($_POST['enfantSelect'], $_POST['class'], $_POST['date'], $_POST['comments'])) {
        $studentId = intval($_POST['enfantSelect']);
        $className = $_POST['class'];
        $date = $_POST['date'];
        $comments = $_POST['comments'];

        try {
            // Utiliser la méthode prepare de la classe Database pour préparer la requête
            $query = $db->prepare("
                INSERT INTO signaler_absences (eleve_id, class, date, comments)
                VALUES (:eleve_id, :class, :date, :comments)
            ");
            $query->bindParam(':eleve_id', $studentId, PDO::PARAM_INT);
            $query->bindParam(':class', $className, PDO::PARAM_STR);
            $query->bindParam(':date', $date, PDO::PARAM_STR);
            $query->bindParam(':comments', $comments, PDO::PARAM_STR);
            $query->execute();

            // Redirection vers la page de confirmation après l'insertion réussie
            header("Location: confirmationdesignaler.php");
            exit();
        } catch (PDOException $e) {
            // Gérer l'erreur d'insertion ici
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    }
}

// Le reste du code reste inchangé
?>
