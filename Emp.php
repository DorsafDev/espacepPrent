<?php
require_once 'Database.php';

class Emp
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    protected function getEmpByClassYear($class, $year)
    {
        $sql = 'SELECT * FROM emp WHERE annee = ? AND year = ?';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$class, $year]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getWeeklySchedule($year, $class)
    {
        $sql = "SELECT * FROM schedule WHERE annee = ? AND classe = ? ORDER BY FIELD(day_of_week, 'Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi'), time_slot_start";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$year, $class]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getWeeklyScheduleForParent($parentId)
    {
        $queryIdEnfants = "SELECT eleve_id FROM enfant_parent WHERE parent_id = ?";
        $stmtIdEnfants = $this->db->prepare($queryIdEnfants);
        $stmtIdEnfants->execute([$parentId]);

        $schedules = [];

        while ($rowIdEnfant = $stmtIdEnfants->fetch(PDO::FETCH_ASSOC)) {
            $idEtudiant = $rowIdEnfant['eleve_id'];
            $schedule = $this->getWeeklyScheduleForStudent($idEtudiant);
            $schedules[] = $schedule;
        }

        return $schedules;
    }

    protected function getWeeklyScheduleForStudent($studentId)
    {
        $sql = "SELECT * FROM schedule WHERE eleve_id = ? ORDER BY FIELD(day_of_week, 'Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi'), time_slot_start";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$studentId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>
