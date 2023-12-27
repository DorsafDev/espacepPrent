<?php
require_once 'ReglementModel.php';

class ReglementController
{
    private $reglementModel;

    public function __construct($conn)
    {
        $this->reglementModel = new ReglementModel($conn);
    }

    public function displayReglement()
    {
        $informationsReglement = $this->reglementModel->getInformationsReglement();
        // Vous pouvez passer ces données à la vue ou les traiter selon les besoins
        return $informationsReglement;
    }
}
?>
