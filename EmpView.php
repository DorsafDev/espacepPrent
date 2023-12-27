<?php
require_once 'Emp.php';

class EmpView extends Emp
{
    public function displayWeeklySchedule($year, $class)
    {
        $schedule = $this->getWeeklySchedule($year, $class);

        echo '<table>';
        echo '<tr><th>Jour</th><th>Matière</th><th>Heure</th></tr>';

        foreach ($schedule as $entry) {
            echo "<tr>";
            echo "<td>{$entry['day_of_week']}</td>";
            echo "<td>{$entry['subject']}</td>";
            echo "<td>{$entry['time_slot_start']} - {$entry['time_slot_end']}</td>";
            echo "</tr>";
        }

        echo '</table>';
    }
}
?>
