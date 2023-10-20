<?php

class Database {

    public static function connexion(): ?PDO {
        $server = 'localhost';
        $user = 'root';
        $password = 'root';
        $db = 'app';
        try {
            return new \PDO("mysql:host=$server;dbname=$db", $user, $password);
        } catch (PDOException $e) {
            echo $e;
            return null;
        }
    }
}
