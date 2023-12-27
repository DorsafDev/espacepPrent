<?php
require_once 'Database.php';

class ActivityModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getChildren($parentId) {
        $getChildrenQuery = $this->db->prepare("
            SELECT ep.id as enfant_parent_id, u.id as parent_id, u.firstName, u.lastName
            FROM enfant_parent ep
            JOIN utilisateur u ON ep.eleve_id = u.id
            WHERE ep.parent_id = :parent_id
        ");
        $getChildrenQuery->bindParam(':parent_id', $parentId);
        $getChildrenQuery->execute();
        return $getChildrenQuery->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
