<?php

require_once 'model/entity/Database.php';
class UserRepository {

    private PDO $db;

    public function __construct() {
        $this->db = (new Database())->connexion();
    }

    public function queryUserByUsername(string $username): ?array
    {
        $rq= $this->db->prepare('SELECT * FROM user WHERE username = :username');
        $rq->bindParam(':username', $username);
        try {
            if ($rq->execute()) {
                return $rq->fetchAll()[0];
            } else {
                die('Query failed');
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    private function queryAllUsers(): array {
        $rq = $this->db->prepare('SELECT * FROM user');
        try {
            if ($rq->execute()) {
                return $rq->fetchAll();
            } else {
                die('Query failed');
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function createUser(string $username, string $password): void {
        $id = uniqid();
        $rq = $this->db->prepare('INSERT INTO user (id, username, password) VALUES (:id, :username, :password)');
        $rq->bindParam(':id', $id);
        $rq->bindParam(':username', $username);
        $rq->bindParam(':password', $password);
        try {
            if (!$rq->execute()) {
                die('Query failed');
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
