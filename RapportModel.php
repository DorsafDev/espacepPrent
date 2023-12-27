<?php
class RapportModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getRapportsEleveParent($idParent)
    {
        $rapports = array();

        // Récupérer les IDs de tous les enfants liés au parent
        $queryIdEnfants = "SELECT eleve_id FROM enfant_parent WHERE parent_id = :idParent";
        $stmtIdEnfants = $this->db->prepare($queryIdEnfants);
        $stmtIdEnfants->bindParam(':idParent', $idParent, PDO::PARAM_INT);
        $stmtIdEnfants->execute();
        $resultatIdEnfants = $stmtIdEnfants->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($resultatIdEnfants)) {
            foreach ($resultatIdEnfants as $rowIdEnfant) {
                $idEleve = $rowIdEnfant['eleve_id'];

                // Récupérer les rapports approuvés de chaque enfant
                $queryRapports = "SELECT * FROM rapport WHERE eleve_id = :idEleve AND approve = 1";
                $stmtRapports = $this->db->prepare($queryRapports);
                $stmtRapports->bindParam(':idEleve', $idEleve, PDO::PARAM_INT);
                $stmtRapports->execute();
                $resultatRapports = $stmtRapports->fetchAll(PDO::FETCH_ASSOC);

                if (!empty($resultatRapports)) {
                    // Stocker les rapports dans le tableau $rapports
                    foreach ($resultatRapports as $rowRapport) {
                        $rapports[] = $rowRapport;
                    }
                }
            }
        }

        return $rapports;
    }
}
?>
