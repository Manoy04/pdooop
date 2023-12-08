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

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM $this->table WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt; 
    }
    
    public function selectID($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
    
    public function update($id) {
        $updatestmt = $this->pdo->prepare("UPDATE $this->table SET email = :email, password = :wachtwoord WHERE id = :id");
        $newEmail = $_POST['new_email'];
        $newWachtwoord = $_POST['new_wachtwoord'];
        $password = password_hash($newWachtwoord, PASSWORD_DEFAULT);
        $updatestmt->bindParam(':email', $newEmail, PDO::PARAM_STR);
        $updatestmt->bindParam(':wachtwoord', $password, PDO::PARAM_STR);
        $updatestmt->bindParam(':id', $id, PDO::PARAM_INT);
        $updatestmt->execute();
        return $updatestmt;
    }
    








}
?>
