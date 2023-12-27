<?php 
class Utilisateur
{
    public $id;
    public $firstName;
    public $lastName;
    public $birthDate;
    public $birthPlace;
    public $email;
    public $password;
    public $PhoneNumber;
    public $userType;
    public $PhotoProfil;

    public function __construct($id, $firstName, $lastName, $birthDate, $birthPlace, $email, $password, $PhoneNumber, $userType, $PhotoProfil)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->birthPlace = $birthPlace;
        $this->email = $email;
        $this->password = $password;
        $this->PhoneNumber = $PhoneNumber;
        $this->userType = $userType;
        $this->PhotoProfil = $PhotoProfil;
    }

    // Ajoutez des méthodes nécessaires si besoin
}
?>