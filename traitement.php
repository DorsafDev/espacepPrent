<?php
require_once 'Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $enfantId = isset($_POST['enfantSelect']) ? intval($_POST['enfantSelect']) : 0;
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $activity = isset($_POST['activity']) ? trim($_POST['activity']) : '';
    $parentId = isset($_POST['parent_id']) ? intval($_POST['parent_id']) : 0; // Ajout du parent_id

    if ($enfantId <= 0 || empty($email) || empty($activity) || $parentId <= 0) {
        header("Location: erreur.php");
        exit();
    }

    // Insérer les données dans la table activites_inscrites
    $db = new Database();
    $insertQuery = $db->prepare("
        INSERT INTO activites_inscrites (eleve_id, email, nom_activite, parent_id)
        VALUES (:enfant_id, :email, :activite, :parent_id)
    ");
    $insertQuery->bindParam(':enfant_id', $enfantId);
    $insertQuery->bindParam(':email', $email);
    $insertQuery->bindParam(':activite', $activity);
    $insertQuery->bindParam(':parent_id', $parentId);
    $insertQuery->execute();
}

// Rediriger vers la page des activités inscrites avec le parent_id
header("Location: activites_inscrites.php?parent_id=" . $parentId);
exit();
?>
