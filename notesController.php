<?php
require_once 'noteModel.php';

class notesController
{
    private $notesModel;

    public function __construct()
    {
        $this->notesModel = new notes();
    }

    public function getParentGrades($parentId)
    {
        return $this->notesModel->getParentGrades($parentId);
    }
}
?>
