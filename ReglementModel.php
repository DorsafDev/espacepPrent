<?php
class ReglementModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getInformationsReglement()
    {
        $informations = array();

        $query = "SELECT section, contenu FROM reglement";
        $result = $this->conn->query($query);

        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $informations[] = $row;
            }
        }

        return $informations;
    }
}
?>
