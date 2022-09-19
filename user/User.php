<?php
class User {
    private $database;

    public function __construct(string $hostname, string $username, string $password, string $dbname) {
        $this->database = new PDO("mysql:hostname={$hostname};dbname={$dbname};", $username, $password);
    }

    public function checkUsername(string $username) {
        $sql = "SELECT * FROM users WHERE username=:username";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword(string $username, string $password) {
        $sql = "SELECT * FROM users WHERE username=:username AND password=:password";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->bindValue(":password", md5($password), PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            return true;
        } else {
            return false;
        }
    }

    public function getCart(string $username) {
        $sql = "SELECT cart from users WHERE username=:username";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":username", $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addToCart(string $username, array $products) {
        $sql = "UPDATE users SET cart = :products WHERE username=:username";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":products", json_encode($products), PDO::PARAM_STR);
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }
}