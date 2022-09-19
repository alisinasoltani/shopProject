<?php
class ProductsDB {
    private $database;

    public function __construct(string $hostname, string $username, string $password, string $dbname) {
        $pdo = new PDO("mysql:host={$hostname};dbname={$dbname};", $username, $password, [PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_STRINGIFY_FETCHES => false]);
        $this->database = $pdo;
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM products";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getProducts(array $ids) {
        for ($i = 0; $i < count($ids); $i++) {
            $sql = "SELECT * from products WHERE id=:id";
            $stmt = $this->database->prepare($sql);
            $stmt->bindValue(":id", $ids[$i]);
            $stmt->execute();
        }
    }
}