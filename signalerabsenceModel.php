<?php
require_once 'Database.php';

class AbsenceModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getChildren($parentId) {
        $query = $this->db->prepare("
            SELECT e.id, u.firstName, u.lastName
            FROM eleve e
            JOIN utilisateur u ON e.id = u.id
            WHERE e.id IN (SELECT eleve_id FROM enfant_parent WHERE parent_id = :parent_id)
        ");
        $query->bindParam(':parent_id', $parentId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
