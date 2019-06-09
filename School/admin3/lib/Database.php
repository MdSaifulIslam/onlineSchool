<?php

class DbConnect {

    private $host = "localhost";
    private $dbname = "result";
    private $user = "root";
    private $pass = "";
    public $pdo;

    public function __construct() {
        if (!isset($this->pdo)) {
            try {
                $conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->pass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo = $conn;
            } catch (PDOException $exc) {
                echo "DataBase error: " . $exc->getMessage();
            }
        }
    }
}

?>
