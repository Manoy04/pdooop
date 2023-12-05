<?php
class Database {
    public $pdo;
    private $table = "user";

    public function __construct($db = "test", $host = "localhost:3307", $user = "root", $pwd = "") {
        $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
        // set the PDO error mode to exception
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function insert($email, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO $this->table (email, password) VALUES (?, ?)");
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute([$email, $password]);
    }

    public function selectAll() {
        $stmt = $this->pdo->query("SELECT * FROM $this->table");
        return $stmt;
    }
}
?>
