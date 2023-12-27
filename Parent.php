
<?php

class Parent extends Utilisateur {
    private $enfants; // Ajoutez un attribut pour stocker les enfants du parent

    public function __construct($id, $firstName, $lastName, $birthDate, $birthPlace, $email, $password, $PhoneNumber, $userType, $PhotoProfil)
    {
        parent::__construct($id, $firstName, $lastName, $birthDate, $birthPlace, $email, $password, $PhoneNumber, $userType, $PhotoProfil);
        $this->enfants = array(); // Initialisez le tableau des enfants
    }
}
?>