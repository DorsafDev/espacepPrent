<?php
class Evenement {
    public $idEven;
    public $title;
    public $description;
    public $heureDebut;
    public $heureFin;
    public $approve;
    public $lieu;

    public function __construct($idEven, $title, $description, $heureDebut, $heureFin, $approve, $lieu) {
        $this->idEven = $idEven;
        $this->title = $title;
        $this->description = $description;
        $this->heureDebut = $heureDebut;
        $this->heureFin = $heureFin;
        $this->approve = $approve;
        $this->lieu = $lieu;
    }
}
















?>