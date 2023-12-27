<?php
class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'parentspace';
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Échec de la connexion : " . $e->getMessage());
        }
    }

    public function prepare($sql)
    {
        return $this->conn->prepare($sql);
    }

    public function getConnection()
    {
        return $this->conn;
    }

    // Ajoutez d'autres méthodes au besoin
}
?>
