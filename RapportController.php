<?php
class ControllerRapport
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getRapportsEleveParent($idParent)
    {
        // Vous pouvez ajouter d'autres logiques de contrôleur si nécessaire
        $rapports = $this->model->getRapportsEleveParent($idParent);
        return $rapports;
    }
}
?>
