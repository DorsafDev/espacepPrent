<?php
require_once 'Database.php';
class notes
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getParentGrades($parentId)
    {
        $grades = array();

        try {
            // Récupérer les IDs de tous les enfants liés au parent
            $queryIdEnfants = "SELECT eleve_id FROM enfant_parent WHERE parent_id = :parentId";
            $stmtIdEnfants = $this->db->prepare($queryIdEnfants);
            $stmtIdEnfants->bindParam(':parentId', $parentId, PDO::PARAM_INT);
            $stmtIdEnfants->execute();

            while ($rowIdEnfant = $stmtIdEnfants->fetch(PDO::FETCH_ASSOC)) {
                $idEleve = $rowIdEnfant['eleve_id'];

                // Récupérer les notes de chaque enfant
                $queryNotes = "SELECT n.*, m.intitule as matiere FROM noteeval n
                               JOIN matiere m ON n.idMatiere = m.id
                               WHERE n.idEleve = :idEleve";
                $stmtNotes = $this->db->prepare($queryNotes);
                $stmtNotes->bindParam(':idEleve', $idEleve, PDO::PARAM_INT);
                $stmtNotes->execute();

                while ($rowNote = $stmtNotes->fetch(PDO::FETCH_ASSOC)) {
                    $grades[] = $rowNote;
                }
            }
        } catch (PDOException $e) {
            // Gérer les erreurs
            echo "Erreur : " . $e->getMessage();
        }

        return $grades;
    }
}
?>
