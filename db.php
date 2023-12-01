<?php
class Database {
    public $pdo;

    public function __construct($db = "test", $host = "localhost:3307", $user = "root", $pwd = "") {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
            // set the PDO error mode to exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected to database $db";
        } catch (PDOException $e) {     
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

$pdo = new Database();
?>
