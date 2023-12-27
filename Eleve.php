<?php class Eleve extends  Utilisateur{

    public $annee;
    public $classe;

    public function __construct($id, $firstName, $lastName, $birthDate, $birthPlace, $email, $password, $PhoneNumber, $userType, $PhotoProfil, $annee, $classe)
    {
        parent::__construct($id, $firstName, $lastName, $birthDate, $birthPlace, $email, $password, $PhoneNumber, $userType, $PhotoProfil);
        $this->annee = $annee;
        $this->classe = $classe;
    }
}

?>